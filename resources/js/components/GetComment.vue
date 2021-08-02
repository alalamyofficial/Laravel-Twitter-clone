<template>
    <div class="card">
        <div class="card-header">Comments</div>
        <div class="card-body">
            <p v-for="(comment, index) in comments" :key="index">
                <span class="badge badge-pill badge-light"
                    >{{ comment.user }} Commented:</span
                >
                {{ comment.comment }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["userid", "tweetid"],
    data() {
        return {
            comments: {}
        };
    },
    mounted() {
        this.getComments();
        this.interval = setInterval(
            function() {
                this.getComments();
            }.bind(this),
            500
        );
    },
    methods: {
        getComments() {
            axios
                .get("getComments" + this.tweetid)
                .then(response => {
                    this.comments = response.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        }
    }
};
</script>
