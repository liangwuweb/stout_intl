<?php require_once('../../../private/initialize.php'); 
?>
<?php require_login(); ?>

<?php 
    if(is_post_request()) {
        $keyword = [];
        $keyword['name'] = $_POST['name'] ?? '';
        
        $result = insert_keyword($keyword);
        if($result === true) {
            //the session message must set before redirect, becasue edirect will start a new http request, so we can store data into 
            //session through the redirect. After redirect, it is not possible to store the data to session.
            $_SESSION['message'] = 'The keyword was created successfully!';
            redirect_to(url_for('/user/keywords/index.php'));
        } else {
            $errors = $result;
        }        
    } else {
    }
?>

<?php $page_title = 'Create Keyword'; ?>
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
                <!-- Begin of col-lg-8 -->
                <div class="col-lg-8">

                    <!-- Begin of Card -->
                    <div class="card shadow position-relative mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Keyword</h6>
                        </div>
                        <div class="card-body card-body-style">
                            <form id="edit-form" data-parsley-validate
                                action="<?php echo url_for('/user/keywords/new.php'); ?>" method="post">
                                <div class="form-group">
                                    <!-- <label name="name">Keyword Name</label> -->
                                    <input required id="name" type="text" name="name" class="form-control"
                                        placeholder="Keyword Name" value="" />
                                </div>
                                <!-- <input type="submit" class="btn btn-success btn-lg btn-block" value="Create" /> -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.end of col-lg-8-->

                <div class="col-lg-4">
                    <div class="card shadow position-relative">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Option</h6>
                        </div>
                        <div class="card-body card-body-style">
                            <div class="row">
                                <div class="col-md-6">
                                    <a type="button" class="btn btn-warning btn-block"
                                        href="<?php echo url_for('/user/keywords/index.php'); ?>">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <button form="edit-form" type="submit"
                                        class="btn btn-success btn-block">Create</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /. end of col 4 -->

            </div>
        </div>
    </div>

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>