<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

  //$post_set = find_all_posts();

?>

<?php $page_title = 'Post' ?>
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

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
                </div>
                <!-- Begin Card Body -->
                <div class="card-body">
                    <div class="table-top">
                        <div class="paginator-wrap">
                            <?php
                                    //DO NOT limit this query with LIMIT keyword, or...things will break!
                                    $query = "SELECT * FROM posts";

                                    //these variables are passed via URL
                                    $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 5; //movies per page
                                    $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
                                    $links = 5;

                                    //__constructor is called
                                    $paginator = new Paginator( $db, $query ); 
                                    $results = $paginator->getData( $limit, $page );

                                    echo $paginator->createLinks( $links, 'pagination' );
                                ?>
                        </div>

                        <span class="actions">
                            <a class=" btn btn-success btn-md" href="<?php echo url_for('/user/posts/new.php'); ?>">
                                New Post
                            </a>
                        </span>
                    </div>
                    <!-- DataTable -->
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Keywords</th>
                            <th>Visible</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>

                        <?php for($i = 0; $i < count($results->data); $i++): ?>
                        <?php $post = $results->data[$i]; ?>
                        <tr>
                            <td><?php echo $post['id']; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <?php $keyword = find_keyword_by_keywords_id($post['keywords_id']); ?>
                            <td><?php echo $keyword['name']; ?></td>
                            <td><?php echo $post['visible'] == 1 ? 'true' : 'false'; ?></td>
                            <td><a class="btn btn-primary btn-md right-align-btn"
                                    href="<?php echo url_for('/user/posts/show.php?id=' . h(u($post['id']))); ?>"
                                    role="button">View</a>
                            </td>
                            <td><a class="btn btn-info btn-md"
                                    href="<?php echo url_for('/user/posts/edit.php?id=' . h(u($post['id']))); ?>"
                                    role='button'>Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-md"
                                    href="<?php echo url_for('/user/posts/delete.php?id=' . h(u($post['id']))); ?>"
                                    role="button">Delete</a>
                            </td>
                        </tr>
                        <?php endfor; ?>
                    </table>
                    <?php //mysqli_free_result($post_set); ?>
                </div>
                <!-- End of Card Body -->
            </div>
        </div>
        <!-- /. End of Container Fluid -->
    </div>
    <!-- /. End of Content -->

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>