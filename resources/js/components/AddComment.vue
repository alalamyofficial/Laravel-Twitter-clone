<template>
    <div class="flex">
        <textarea
            name="comment"
            v-model="formData.comment"
            class="form-control mb-1"
            rows="2"
            placeholder="Write a comment here..."
            id="example1"
            data-emoji-input="unicode"
            data-emojiable="true"
        ></textarea>
        <button class="btn btn-light" @click="commentStore">Comment</button>
    </div>
</template>

<script>
export default {
    props: ["userid", "tweetid"],
    data() {
        return {
            formData: {
                comment: "",
                user_id: this.userid,
                tweet_id: this.tweetid
            }
        };
    },
    methods: {
        commentStore() {
            axios
                .post("/tweet/comment/store", this.formData)
                .then(response => {
                    console.log(response.data);
                    this.formData.comment = "";
                })
                .catch(errors => {
                    console.log(errors);
                });
        }
    }
};
</script>
