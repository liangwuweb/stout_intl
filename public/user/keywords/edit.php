<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php 

    if(!isset($_GET['id'])) {
        redirect_to(url_for('/user/keywords/index.php'));
    }
    $id = $_GET['id'];
    
    if(is_post_request()) {

        $keyword = [];
        $keyword['name'] = $_POST['name'] ?? '';
        $keyword['id'] = $id ?? '';


        $result = update_keyword($keyword);
        $_SESSION['message'] = 'The keyword was updated successfully!';
        redirect_to(url_for('/user/keywords/index.php'));

    } else {
        $keyword = find_keyword_by_id($id);
    }
?>

<?php $page_title = 'Edit Keyword'; ?>
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
                            <h6 class="m-0 font-weight-bold text-primary">Eidt Keyword</h6>
                        </div>
                        <div class="card-body card-body-style">
                            <form id="edit-form" data-parsley-validate
                                action="<?php echo url_for('/user/keywords/edit.php?id=' . h(u($id))); ?>"
                                method="post">
                                <div class="form-group">
                                    <!-- <label name="name">Keyword Name</label> -->
                                    <input required id="name" type="text" name="name" class="form-control"
                                        value="<?php echo $keyword['name']; ?>" />
                                </div>
                                <!-- <input type="submit" class="btn btn-success btn-lg btn-block" value="Update" /> -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.end of col-md-8-->

                <div class="col-md-4">
                    <div class="card shadow position-relative">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                        </div>
                        <div class="card-body card-body-style">
                            <dl class="row">
                                <dt class="col-md-5">Keyword ID:</dt>
                                <dd class="col-md-7"><?php echo h($keyword['id']); ?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5">Create At:</dt>
                                <dd class="col-sm-7">
                                    <?php echo h(date('M j, Y h:i a', strtotime($keyword['created_at']))); ?>
                                </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5">Last Updated:</dt>
                                <dd class="col-sm-7">
                                    <?php echo h(date('M j, Y h:i a', strtotime($keyword['updated_at']))); ?></dd>
                            </dl>
                            <div class="row">
                                <div class="col-md-6">
                                    <a type="button" class="btn btn-warning btn-block"
                                        href="<?php echo url_for('/user/keywords/index.php'); ?>">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <button form="edit-form" type="submit" class="btn btn-success btn-block">Save
                                        Changes</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /. end of col-md-4 -->
            </div>
        </div>
    </div>

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>