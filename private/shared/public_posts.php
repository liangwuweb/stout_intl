    <?php 
      //DO NOT limit this query with LIMIT keyword, or...things will break!
      $query = "SELECT * FROM posts";

      //these variables are passed via URL
      $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 3; //movies per page
      $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
      $links = 5;

      $paginator = new Paginator( $db, $query ); //__constructor is called
      $results = $paginator->getData( $limit, $page );

      //print_r($results);die; $results is an object, $result->data is an array

      //print_r($results->data);//die; //array
      //echo '</br>';
    ?>



    <?php //while(($post= mysqli_fetch_assoc($posts)) && ($content= mysqli_fetch_assoc($contents))) { ?>
    <?php for($i = 0; $i < count($results->data); $i++): ?>
    <?php $post = $results->data[$i]; ?>
    <div class="col-md-4">
        <!-- Begin of Card -->
        <a href="<?php echo url_for('single_post.php?id=' . h(u($post['id']))); ?>" class="card shadow mb-4 post">
            <!-- Begin of Card Body -->
            <div class="card-body ">
                <h3 class="mb-2">
                    <?php echo h($post['title']); ?>
                </h3>
                <?php 
                    $keyword = find_keyword_by_keywords_id($post['keywords_id']); 
                    $content = mysqli_fetch_assoc(find_post_content_by_id($post['id']));
                ?>
                <p>
                    <div><?php echo h(strip_tags(rtrim($content['ExtractString']))); ?>...</div>
                </p>
            </div>
            <!-- ./ End of Card Body -->
            <div class="card-footer text-muted">
                <strong class="d-inline-block text-success"><?php echo h($keyword['name']); ?></strong>
                <span
                    class="mb-1 text-muted">&nbsp<?php echo h(date('M j, Y', strtotime($post['timestamp']))); ?></span>
            </div>
        </a>
        <!-- ./ End of Card -->
    </div>
    <?php endfor; ?>
    <?php //} // while $nav_subjects ?>