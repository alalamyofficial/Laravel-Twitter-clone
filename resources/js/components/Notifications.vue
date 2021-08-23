<template>
    <li class="nav-item dropdown" style="right: 18px;">
        <a
            id="navbarDropdown"
            class="nav-link"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
            <div class="flex">
                <i
                    class="fa fa-bell"
                    id="notify_icon"
                    style="margin-right: -7px;
                            margin-top: 9px;
                            font-size: 20px;"
                ></i>
                <span id="notify_num" v-show="unreadnotifications.length > 0">
                    <sup
                        ><big
                            style=" background-color: rgb(218 99 99);
                                        color: white;
                                        padding: 3px;
                                        font-size: 15px;
                                        margin-right: -9px;
                                        min-width: 18px;
                                        min-height: 19px;
                                        border-radius: 32%;
                                        line-height: 19px;
                                        font-family: sans-serif;
                                    "
                            >{{ unreadnotifications.length }}</big
                        ></sup
                    >
                </span>
            </div>
        </a>

        <div
            class="dropdown-menu dropdown-menu-right"
            aria-labelledby="navbarDropdown"
        >
            <a
                class="dropdown-item"
                v-show="unreadnotifications.length > 0"
                @click="markAsRead"
                >Mark all as read!</a
            >
            <!-- <hr /> -->
            <a
                class="dropdown-item"
                v-for="(unread, index) in unreadnotifications"
                :key="index"
                @click="showNotifications()"
                ><hr />
                <h5>{{ unread.data.comment_status }}</h5>
                <!-- <p>{{ unread.data.post_title }}</p> -->
                <b>{{ unread.data.user_name }}</b> write a comment
                <p>{{ unread.data.comment }}</p>
                <!-- <p>{{ moment(unread.created_at).fromNow() }}</p> -->
            </a>
            <a class="dropdown-item" v-show="unreadnotifications.length == 0"
                >No new notifications</a
            >
        </div>
    </li>
</template>

<script>
export default {
    mounted() {
        this.getNotifications();
        this.interval = setInterval(
            function() {
                this.getNotifications();
            }.bind(this),
            500
        );
    },
    props: ['user'],
    data() {
        return {
            unreadnotifications: {},
            // user:''
        };
    },
    methods: {
        getNotifications() {
            axios
                .get("/unreadNotifications",{
                    params: {
                        user: this.user
                    }
                })
                .then(response => {
                    this.unreadnotifications = response.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        markAsRead() {
            axios
                .get("/markAsRead",{
                    params: {
                        user: this.user
                    }
                })
                .then(response => {
                    location.reload();
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        showNotifications() {
            // var post_id = this.unreadnotifications[index].data.post_id;
            // var notification_id = this.unreadnotifications[index].id;
            // location.href = "/post/" + post_id + "/" + notification_id;
            this.markAsRead();
            location.href = "/notifications";
            // axios.get()
        }
    }
};
</script>
