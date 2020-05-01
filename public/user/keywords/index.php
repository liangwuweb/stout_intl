<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

  //$keywords_set = find_all_keywords();

?>

<?php $page_title = 'Keywords' ?>


<?php 
  include(PUBLIC_PATH . '/dashboard/includes/admin_header.php'); 
  include(PUBLIC_PATH . '/dashboard/includes/admin_navbar.php'); 
?>

<!-- Begin Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Begin Page Content -->
    <div id="content">
        <?php include(PUBLIC_PATH . '/dashboard/includes/admin_topbar.php');  ?>

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Keywords</h6>
                </div>
                <!-- Begin Card Body -->
                <div class="card-body">
                    <div class="table-top">
                        <div class="paginator-wrap">
                            <?php
                                    //DO NOT limit this query with LIMIT keyword, or...things will break!
                                    $query = "SELECT * FROM keywords";

                                    //these variables are passed via URL
                                    $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 5; //movies per page
                                    $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
                                    $links = 5;

                                    $paginator = new Paginator( $db, $query ); //__constructor is called
                                    $results = $paginator->getData( $limit, $page );

                                    //print_r($results);die; $results is an object, $result->data is an array

                                    //print_r($results->data);//die; //array
                                    //echo '</br>';

                                    echo $paginator->createLinks( $links, 'pagination' );
                                ?>
                        </div>
                        <span class="actions">
                            <a class=" btn btn-success btn-md" href="<?php echo url_for('/user/keywords/new.php'); ?>">
                                New Keywords
                            </a>
                        </span>
                    </div>

                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Keywords</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>

                        <?php for ($i = 0; $i < count($results->data); $i++): ?>
                        <?php 
                            //store in $movie variable for easier reading
                            $keyword = $results->data[$i]; 
                            ?> <tr>
                            <td><?php echo $keyword['id']; ?></td>
                            <td><?php echo $keyword['name']; ?></td>
                            <td><a class="btn btn-info btn-md"
                                    href="<?php echo url_for('/user/keywords/edit.php?id=' . h(u($keyword['id']))); ?>"
                                    role='button'>Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-md"
                                    href="<?php echo url_for('/user/keywords/delete.php?id=' . h(u($keyword['id']))); ?>"
                                    role="button">Delete</a>
                            </td>
                        </tr>
                        <?php endfor; ?>
                    </table>
                </div>
            </div>
            <!-- /. end of card -->


        </div>
        <!-- /. end of container -->
    </div>

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>