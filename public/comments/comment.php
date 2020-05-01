<!-- comments top section -->
<div class="container-fluid pt-5 comment-wrap">
    <div class="container">
        <div class="row justify-content-center mx-md-n4 pt-5">
            <div class="col-md-10 col-lg-8 mb-5 comment-section">
                <!-- comment form -->
                <?php if(is_logged_in()): ?>
                <form class="clearfix" action="post_details.php" method="post" id="comment_form">
                    <h4 class="font-weight-light">Leave a comment</h4>
                    <textarea name="comment" class="form-control textarea-style content" cols="30" rows="3"></textarea>
                    <button class="btn btn-primary btn-md pull-right" id="submit-comment">Submit</button>
                </form>
                <?php else: ?>

                <a href="<?php echo url_for('/user/login.php'); ?>" class="card comment-shadow sign-box">
                    <div class="card-body text-center">
                        <h4 class="font-weight-bold">Sign into
                            post a comment
                        </h4>
                    </div>
                </a>
                <?php endif ?>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-10 col-lg-8">
                <!-- Display total number of comments on this post  -->
                <div class="card bg-transparent">
                    <div class="card-body text-center">
                        <h2 class="font-weight-light text-light" style="font-weight:900 !important;"><span
                                id="comments-count"><?php echo mysqli_num_rows($comment); ?></span>
                            Comments
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- comments List -->
        <div id="comment-list" class="pb-5"></div>
    </div>
</div>