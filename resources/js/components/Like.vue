<template>
    <div></div>
</template>

<script>
export default {
    props: ["id"],
    computed: {
        likers() {
            var Likers = [];
        }
    },
    methods: {
        toggleLike: function() {
            if (this.liked) {
                this.like();
            } else {
                this.unlike();
            }
        },

        like: function(id) {
            this.submitted = true;
            this.$http.post("/api/like", { post_id: id }).then(
                response => {},
                response => {
                    // error callback
                }
            );
        },

        unlike: function(id) {
            this.submitted = true;

            this.$http.post("/api/unlike", { post_id: id }).then(
                response => {},
                response => {
                    // error callback
                }
            );
        }
    }
};
</script>
