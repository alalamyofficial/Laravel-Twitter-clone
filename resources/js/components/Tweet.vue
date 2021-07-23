<template>
    <div>
        <form @submit.prevent="saveTweets">
            <div class="border-2 border-blue-500 rounded-lg px-8 py-6 mb-8">
                <textarea
                    class="resize w-full"
                    style="height:100px"
                    placeholder="What's up doc ?"
                    v-model="body"
                ></textarea>

                <hr class="my-4" />

                <footer class="flex justify-between items-center">
                    <div class="flex items-center text-sm">
                        <img
                            src=""
                            alt="your avatar"
                            class="rounded-full mr-2"
                            style="width:50px; height:50px"
                        />
                    </div>

                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
                        @click.prevent="saveTweets"
                    >
                        Tweet
                    </button>
                </footer>
            </div>
        </form>

        <br />

        <div class="border border-gray-300 rounded-lg">
            <tr v-for="one in tweets" :key="one.id">
                <div class="flex p-4  border-b border-b-gray-400 ">
                    <div class="mr-3 flex-shrink-0">
                        <a href="">
                            <img
                                src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                alt=""
                                class="rounded-full mr-2"
                                style="width:50px; height:50px"
                            />
                        </a>
                    </div>

                    <div>
                        <h5 class="fomt-bold mb-4">
                            <div class="flex">
                                <a href="" class="pt-2 pb-2 pr-5">
                                    {{ user.name }}
                                </a>
                                <p class="text-sm mb-3 pt-2">
                                    {{ one.created_at | timeformat }}
                                </p>
                            </div>

                            <br /><br />
                            <p class="text-sm mb-3">{{ one.body }}</p>

                            <like :id="one.id"></like>
                        </h5>
                    </div>

                    <div
                        style="right: 690px;
                    position: absolute;
                    padding-top: 30px; padding-buttom:10px"
                    ></div>
                </div>
            </tr>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Like from "./Like";

export default {
    mounted() {
        console.log(this.getData());
    },

    components: {
        Like
    },

    props: ["user"],

    data() {
        return {
            body: "",
            tweets: [], // you can do all:{} also
            editbody: "",
            id: "",
            user_id: "{{Auth::user()}}",
            created_at: "",
            post_id: ""
        };
    },

    // created() {
    //     this.getData();
    // },
    methods: {
        saveTweets() {
            axios
                .post("tweet/store", {
                    body: this.body
                })
                .then(res => {
                    this.body = "";
                    this.getData();
                });
        },
        getData() {
            axios
                .get("tweets")
                .then(res => {
                    console.log(res.data);
                    this.tweets = res.data;
                })
                .catch(console.log("Not Showing"));
        },
        likeIt() {
            axios
                .post("like/store", {
                    id: this.post_id
                })
                .then(res => {
                    console.log(res);
                });
            alert(id);
        }
    }
};
</script>
