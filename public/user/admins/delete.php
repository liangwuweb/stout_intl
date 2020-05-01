<?php

require_once('../../../private/initialize.php');

require_login(); 

if(!isset($_GET['id'])) {
  redirect_to(url_for('/user/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_admin($id);
  $_SESSION['message'] = 'Admin deleted.';
  redirect_to(url_for('/user/admins/index.php'));
} else {
  $admin = find_admin_by_id($id);
}

?>

<?php $page_title = 'Delete Admin'; ?>
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
                            <p class="lead">Are you sure you want to delete this admin?</p>
                            <p class="text-muted font-italic" style="font-family:monospace; font-size: 1.2rem;">
                                <?php echo h($admin['username']); ?></p>

                            <form id="edit-form"
                                action="<?php echo url_for('/user/admins/delete.php?id=' . h(u($admin['id']))); ?>"
                                method="post">
                            </form>
                            <div class="row">
                                <div class="col-md-6"><a type="button" class="btn btn-warning btn-block"
                                        href="<?php echo url_for('/user/admins/index.php'); ?>">Cancel</a></div>
                                <div class="col-md-6"> <button form="edit-form" type="submit"
                                        class="btn btn-danger btn-block">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./ End of col-md-8 -->
            </div>
        </div>
    </div>
    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>