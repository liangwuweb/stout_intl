<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/user/posts/index.php'));
}
$id = $_GET['id'];

$post = find_post_by_id($id);

if(is_post_request()) {

  $result = delete_post($id);
  $_SESSION['message'] = 'The post was deleted successfully.';
  redirect_to(url_for('/user/posts/index.php'));

} 

?>

<?php $page_title = 'Delete Post'; ?>
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
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Delete Post</h6>
                        </div>
                        <div class="card-body">
                            <p class="lead">Are you sure you want to delete this post?</p>
                            <span class="font-italic"
                                style="font-family:monospace; font-size: 1.2rem;"><?php echo h($post['title']); ?></span>

                            <form id="edit-form"
                                action="<?php echo url_for('/user/posts/delete.php?id=' . h(u($post['id']))); ?>"
                                method="post">
                                <!-- <input class="btn btn-danger" type="submit" name="commit" value="Delete" /> -->
                            </form>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <a type="button" class="btn btn-warning btn-block"
                                        href="<?php echo url_for('/user/posts/index.php'); ?>">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <button form="edit-form" type="submit"
                                        class="btn btn-danger btn-block">Delete</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. end of col-md-8 -->
            </div>
            <!-- /. end of row -->
        </div>
    </div>

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>