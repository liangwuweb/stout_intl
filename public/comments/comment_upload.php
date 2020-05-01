<?php require_once('../../private/initialize.php'); ?>

<?php 
if (isset($_POST['commentPosted']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    global $db;
    
    $comment = [];
    $comment['post_id'] = $_POST['postId'] ?? '';
    $comment['admin_id'] = $_POST['userId'] ?? '';
    $comment['content'] = $_POST['content'] ?? '';
    
    $result = insert_comment($comment);
    if ($result == true) {
        $new_id = mysqli_insert_id($db);
        $inserted_comment = find_comment_by_id($new_id);
        $first_name = find_admin_by_id($inserted_comment['admin_id'])['first_name'];
        $last_name = find_admin_by_id($inserted_comment['admin_id'])['last_name'];
        $full_name = $first_name . $last_name;
        $new_comment = "<div class='row justify-content-center mx-n4 mb-5'>
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
                                        <h5 class='comment-name mb-2'>" . $full_name . "</h5>
                                        <p class='comment-date mb-2'><span style='color:#ff9d29; font-weight:700;'># &nbsp</span>" . date('M j, Y h:i a', strtotime($inserted_comment['created_at'])) . "
                                        </p>
                                        <p>" . $inserted_comment['content'] . "</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-auto'>
                            <a class='btn btn-success reply-btn' href='#' data-id='". $inserted_comment['id'] . "'>Reply</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
		$comment_info = array(
			'new_comment' => $new_comment,
			'comments_count' => mysqli_num_rows(find_comments_by_post_id($comment['post_id']))
		);
		echo json_encode($comment_info);
		exit();
    } else {
        $errors = $result;
    }
}
?>

<!-- $new_comment = "<div class='comment clearfix'>
    <img src='" . url_for(' /assets/image/profile.png') . "' alt='' class='profile_pic'>
					        <div class='comment-details'>
						        <p class='comment-name'>" . $full_name . "</p>
						        <p class='comment-date'>" . date('M j, Y h:i a', strtotime($inserted_comment['created_at'])) . "</p>
						        <p>" . $inserted_comment['content'] . "</p>
						        <a class='reply-btn' href='#' data-id='" . $inserted_comment['id'] . "'>reply</a>
					        </div>
				        </div>" ; -->