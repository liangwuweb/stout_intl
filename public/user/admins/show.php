<?php

require_once('../../../private/initialize.php');

require_login();

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$admin = find_admin_by_id($id);

?>

<?php $page_title = 'Show Admin'; ?>
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
                            <h6 class="m-0 font-weight-bold text-primary">Admin Details</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-md-3">Admin:</dt>
                                <dd class="col-md-9"><?php echo h($admin['first_name'] . ' ' . $admin['last_name'] ); ?>
                                </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-md-3">First name:</dt>
                                <dd class="col-md-9"><?php echo h($admin['first_name']); ?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-md-3">Last name:</dt>
                                <dd class="col-md-9"><?php echo h($admin['last_name']); ?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-md-3">Email:</dt>
                                <dd class="col-md-9"><?php echo h($admin['email']); ?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-md-3">Username:</dt>
                                <dd class="col-md-9"><?php echo h($admin['username']); ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow position-relative">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Option</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-5">Created At:</dt>
                                <dd class="col-sm-7">
                                    <?php echo h(date('M j, Y h:i a', strtotime($admin['created_at']))); ?>
                                </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5">Last Updated:</dt>
                                <dd class="col-sm-7">
                                    <?php echo h(date('M j, Y h:i a', strtotime($admin['updated_at']))); ?></dd>
                            </dl>
                            <div class="row">
                                <div class="col-md-12">
                                    <a type="button" class="btn btn-success btn-block"
                                        href="<?php echo url_for('/user/admins/edit.php?id=' . h(u($admin['id']))); ?>">Edit</a>

                                    <a type="button" class="btn btn-danger btn-block"
                                        href="<?php echo url_for('/user/admins/delete.php?id=' . h(u($admin['id']))); ?>">Delete</a>

                                    <a type="button" class="btn btn-warning btn-block"
                                        href="<?php echo url_for('/user/admins/index.php'); ?>">Cancel</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of container -->
    </div>

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 

?>