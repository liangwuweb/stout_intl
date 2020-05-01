<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {
  $subject = [];
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';
  $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = insert_admin($admin);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Admin created.';
    redirect_to(url_for('/user/admins/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $admin = [];
  $errors = [];
  $admin["first_name"] = '';
  $admin["last_name"] = '';
  $admin["email"] = '';
  $admin["username"] = '';
  $admin['password'] = '';
  $admin['confirm_password'] = '';
  
}

?>

<?php $page_title = 'Create Admin'; ?>
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
                            <h6 class="m-0 font-weight-bold text-primary">New Admin</h6>
                        </div>
                        <div class="card-body card-body-style">

                            <?php echo display_errors($errors); ?>

                            <form id="edit-form" data-parsley-validate
                                action="<?php echo url_for('/user/admins/new.php'); ?>" method="post">
                                <div class="form-group">
                                    <!-- <label name="first_name">First Name</label> -->
                                    <input required id="first_name" type="text" name="first_name" class="form-control"
                                        placeholder="First Name" value="<?php echo h($admin['first_name']); ?>" />
                                </div>

                                <div class="form-group">
                                    <!-- <label name="last_name">Last Name</label> -->
                                    <input required id="last_name" type="text" name="last_name" class="form-control"
                                        placeholder="Last Name" value="<?php echo h($admin['last_name']); ?>" />
                                </div>

                                <div class="form-group">
                                    <!-- <label name="username">Username</label> -->
                                    <input required id="username" type="text" name="username" class="form-control"
                                        placeholder="Username" value="<?php echo h($admin['username']); ?>" />
                                </div>

                                <div class="form-group">
                                    <!-- <label name="email">Email</label> -->
                                    <input required id="email" type="text" name="email" class="form-control"
                                        placeholder="Email" value="<?php echo h($admin['email']); ?>" />
                                </div>

                                <div class="form-group">
                                    <!-- <label name="password">Password</label> -->
                                    <input required id="password" type="password" name="password" class="form-control"
                                        placeholder="Password" value="" />
                                </div>

                                <div class="form-group">
                                    <!-- <label name="confirm_password">Confirm Password</label> -->
                                    <input required id="confirm_password" type="password" name="confirm_password"
                                        class="form-control" placeholder="Confirm Password" value="" />
                                </div>

                                <!-- <div id="operations">
                            <input type="submit" value="Create Admin" />
                        </div> -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ./ End of col-md-8 -->

                <div class="col-md-4">
                    <div class="card shadow position-relative">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Option</h6>
                        </div>
                        <div class="card-body card-body-style">
                            <div class="row">
                                <p class="col-md-12">
                                    Passwords should be at least 12 characters and include at least one uppercase
                                    letter,
                                    lowercase letter, number, and symbol.
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a type="button" class="btn btn-warning btn-block"
                                        href="<?php echo url_for('/user/admins/index.php'); ?>">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <button form="edit-form" type="submit"
                                        class="btn btn-success btn-block">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./ End of col-md-4 -->
            </div>
        </div>
        <!-- ./ End of Container -->
    </div>

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>