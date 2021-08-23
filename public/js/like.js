$(".like").on("click", function(event) {
    event.preventDefault();

    tweetId = event.target.parentNode.parentNode.dataset["tweet_id"];

    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        method: "POST",
        url: urlLike,
        data: { isLike: isLike, tweetId: tweetId, _token: token }
    }).done(function() {
        console.log("done");
    });
});
