<?php require_once('../../private/initialize.php'); ?>

<?php 
    $post_id = $_POST['postId'];
    $user_id = $_POST['userId'];
    // echo $post_id;
    // echo $user_id;
    $comment_set = find_comments_by_post_id($post_id);
    
    //use the data form DB to construct dynamic html entries for each row of data
	if(mysqli_num_rows($comment_set) > 0) {
        $res_list = [];
        while($comment = mysqli_fetch_assoc($comment_set)) {
           $first_name = find_admin_by_id($comment['admin_id'])['first_name'];
           $last_name = find_admin_by_id($comment['admin_id'])['last_name'];
           $fullname = $first_name . ' ' . $last_name;
           $res = "<div class='row justify-content-center mx-n4 mb-5'>
        <div class='col-md-8'>
            <div class='card comment-shadow bg-md-blue '>
                <div class='comment card-body py-4 px-4'>
                    <div class='row justify-content-between'>
                        <div class='col-md-10'>
                            <div class='row no-gutters'>
                                <div class='col-auto mr-3'>
                                    <img src='" .  url_for('/assets/image/profile.svg') . "' alt=''
                                        class = 'profile_pic'>
                                </div>
                                <div class='col-md-10'>
                                    <div class='comment-details'>
                                        <h5 class='comment-name mb-2'>" . $fullname . "</h5>
                                        <p class='comment-date mb-2'><span style='color:#ff9d29; font-weight:700;'># &nbsp</span>" . date('M j, Y h:i a', strtotime($comment['created_at'])) . "
                                        </p>
                                        <p>" . $comment['content'] . "</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-auto'>
                            <a class='btn btn-success reply-btn' href='#' data-id='". $comment['id'] . "'>Reply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
            //push each entry to the array        
            array_unshift($res_list, $res); 
        } 
        
        $res_set=array('res_list'=> $res_list);
        
        echo json_encode($res_set);
        }
?>