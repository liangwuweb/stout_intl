<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php 
$id = $_GET['id'] ?? '';
$post = find_post_by_id($id);
$keyword = find_keyword_by_keywords_id($post['keywords_id']);
$content = mysqli_fetch_assoc(find_post_content_by_id($id));

?>

<?php $page_title = 'View Post'; ?>

<?php 
//include(SHARED_PATH . '/global_header.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_header.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_navbar.php'); 
?>

<!-- Begin Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Begin Page Content -->
    <div id="content">
        <?php include(PUBLIC_PATH . '/dashboard/includes/admin_topbar.php');  ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <!-- Begin of Card -->
                    <div class="card shadow position-relative mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Post Details</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-md-2">Post Title:</dt>
                                <dd class="col-md-10"><?php echo h($post['title']); ?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-md-2">Keyword:</dt>
                                <dd class="col-md-10"><?php echo h($keyword['name']); ?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-md-2">Brief:</dt>
                                <dd class="col-md-10"><?php echo h(strip_tags(rtrim($content['ExtractString']))); ?>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Begin of Card -->
                    <div class="card shadow position-relative mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Time</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-5">Created At:</dt>
                                <dd class="col-sm-7">
                                    <?php echo h(date('M j, Y h:i a', strtotime($post['timestamp']))); ?>
                                </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5">Last Updated:</dt>
                                <dd class="col-sm-7"><?php echo h(date('M j, Y h:i a')); ?></dd>
                            </dl>
                            <div class="row">
                                <div class="col-md-12">
                                    <a type="button" class="btn btn-dark btn-block"
                                        href="<?php echo url_for('/user/posts/index.php'); ?>">Go Back</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 

?>