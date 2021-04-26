function listComment() {
    var postId = $(".single-post").data("postId");
    var userId = $(".single-post").data("userId");
    $.ajax({
        url: "./comments/comment_list.php",
        method: "POST",
        data: {
            postId: postId,
            userId: userId
        },
        success: function (res) {
            var resSet = JSON.parse(res).res_list;

            //get all entries by contact all the html into one string 
            function getAllEntry(array) {
                var allEntry = "";
                resSet.forEach(function (entry) {

                    allEntry = allEntry.concat(entry);
                })
                return allEntry;
            }
            //insert the html string into Jquery html() mehtod to replace previous content
            $("#comment-list").html(function () {
                return getAllEntry(resSet);
            });

        }
    })
}

$(document).ready(function () {
    listComment();

    // update the comment list every five sec
    setInterval(function () {
        listComment();
    }, 5000);

    // When user clicks on submit comment to add comment under post
    $('#submit-comment').click(function (event) {
        event.preventDefault();
        var content = $('.content').val();
        var postId = $(".single-post").data("postId");
        var userId = $(".single-post").data("userId");
        // Stop executing if not value is not entered
        if (content === "") return;
        $.ajax({
            url: './comments/comment_upload.php',
            method: "POST",
            data: {
                content: content,
                postId: postId,
                userId: userId,
                commentPosted: 1
            },
            success: function (data) {
                var response = JSON.parse(data);
                if (data === "error") {
                    alert('There was an error adding comment. Please try again');
                } else {
                    $('#comment-list').prepend(response.new_comment)
                    $('#comments-count').text(response.comments_count);
                    $('#content').val('');
                }
            }
        });
    });
});