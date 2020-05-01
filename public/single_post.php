<?php require_once('../private/initialize.php'); ?>

<?php
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $post = find_post_by_id($post_id);
    $time = date_create($post['timestamp']);
    $keyword = find_keyword_by_keywords_id($post['keywords_id']);
    $comment = find_comments_by_post_id($post_id);
    //print_r($comment);
    if (!$post) {
        redirect_to(url_for('/index.php'));
    }
} else {
    redirect_to(url_for('/index.php'));
}
?>

<?php $page_title = 'Single Post'; ?>

<?php include(SHARED_PATH . '/home_header.php'); ?>

<main role="main">
    <div class="container-fluid single-post-wrap">
        <!-- Start of container -->
        <div class="container">
            <div class="row no-gutters mx-md-n3 justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="single-post" data-post-id="<?php echo $post_id; ?>" data-user-id="<?php if (is_logged_in()) {
                                                                                                        echo $_SESSION['admin_id'];
                                                                                                    } ?>">
                        <?php if (isset($post)) { ?>
                            <h3 class="mb-4"><?php echo $post['title']; ?></h3>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="single-post-meta mr-4">
                                    <img class="single-post-meta-img" src="<?php echo url_for('/assets/image/profile.svg'); ?>" />
                                    <div class="single-post-meta-details">
                                        <div class="single-post-meta-details-name"><?php echo  $keyword['name']; ?></div>
                                        <div class="single-post-meta-details-date">
                                            <?php echo h(date('M j, Y', strtotime($post['timestamp']))); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-meta-links">
                                    <a href="#!"><i class="fas fa-thumbs-up"></i></a>
                                    <a href="#!"><i class="fas fa-bookmark fa-fw"></i></a>
                                </div>
                            </div>
                            <div><?php echo $post['content'] ?></div>
                            <hr class="my-5">
                            <div class="text-center mb-5">
                                <a class="btn btn-transparent-dark btn-marketing rounded-pill" href="<?php echo url_for('/index.php'); ?>">Back to Home Page</a>
                            </div>
                        <?php } else {
                            redirect_to(url_for('/index.php'));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ End of container -->
    </div>
    <?php include(PUBLIC_PATH . '/comments/comment.php'); ?>
</main>
<div class="bot-layer"></div>
<script src="<?php echo url_for('/js/comment.js'); ?>"></script>
<?php include(SHARED_PATH . '/global_footer.php'); ?>



<!-- <div class="container my-5">
    <div class="row justify-content-center mx-n4">
        <div class="col-md-8">
            <div class="card shadow">
                <div class='comment card-body py-4 px-4'>
                    <div class="row justify-content-between">
                        <div class="col-md-10">
                            <div class="row no-gutters">
                                <div class="col-auto mr-3">
                                    <img src=" <?php //echo url_for('/assets/image/profile.png'); 
                                                ?>" alt=""
                                        class="profile_pic">
                                </div>
                                <div class="col-md-10">
                                    <div class='comment-details'>
                                        <p class='comment-name mb-2'>Liang Wu</p>
                                        <p class='comment-date mb-2'><span style="color:#28a745;"># &nbsp</span>March
                                            10, 2020
                                        </p>
                                        <p>This is my first comment</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <a class="btn btn-success" href="" data-id="">Reply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->