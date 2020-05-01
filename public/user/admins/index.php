<?php

require_once('../../../private/initialize.php');

require_login();

$admin_set = find_all_admins();

?>

<?php $page_title = 'Admins'; ?>
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
            <div class="card shadow mb-4 position-relative">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Admins</h6>
                </div>
                <!-- Begin Card Body -->
                <div class="card-body">
                    <div class="table-top">
                        <span class="actions">
                            <a class=" btn btn-success btn-md" href="<?php echo url_for('/user/admins/new.php'); ?>">
                                New Admins
                            </a>
                        </span>
                    </div>

                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>First</th>
                            <th>Last</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>

                        <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
                        <tr>
                            <td><?php echo h($admin['id']); ?></td>
                            <td><?php echo h($admin['first_name']); ?></td>
                            <td><?php echo h($admin['last_name']); ?></td>
                            <td><?php echo h($admin['email']); ?></td>
                            <td><?php echo h($admin['username']); ?></td>
                            <td><a class="btn btn-primary btn-md"
                                    href="<?php echo url_for('/user/admins/show.php?id=' . h(u($admin['id']))); ?>">View</a>
                            </td>
                            <td><a class="btn btn-info btn-md"
                                    href="<?php echo url_for('/user/admins/edit.php?id=' . h(u($admin['id']))); ?>">Edit</a>
                            </td>
                            <td><a class="btn btn-danger btn-md"
                                    href="<?php echo url_for('/user/admins/delete.php?id=' . h(u($admin['id']))); ?>">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php mysqli_free_result($admin_set);?>
                </div>
            </div>
        </div>
        <!-- ./ End of Container -->
    </div>

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>