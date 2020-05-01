<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php 

    if(!isset($_GET['id'])) {
        redirect_to(url_for('/user/posts/index.php'));
    }
    $id = $_GET['id'];
    
    if(is_post_request()) {

        $post = [];
        $post['title'] = $_POST['title'] ?? '';
        $post['keywords_id'] = $_POST['keywords'] ?? '';
        $post['visible'] = $_POST['visible'] ?? '';
        $post['content'] = $_POST['content'] ?? '';
        $post['id'] = $id ?? '';

        $result = update_post($post);
        $_SESSION['message'] = "The post is updated successfully!";
        redirect_to(url_for('/user/posts/show.php?id=' .$id));
    } else {
        $post = find_post_by_id($id);
    }
?>

<?php $page_title = 'Edit Post'; ?>
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
                            <h6 class="m-0 font-weight-bold text-primary">Create Post</h6>
                        </div>
                        <div class="card-body card-body-style">
                            <form id="edit-form" action="<?php url_for('/user/posts/edit.php?id=' . h(u($id))); ?>"
                                method="post">
                                <div class="form-group">
                                    <label name="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="<?php echo $post['title']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label name="keywords">Keywords</label>
                                    <select id="keywords" class="form-control" name="keywords"
                                        data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
                                        <?php 
                                            $keyword_set = find_all_keywords();
                                            while($keyword = mysqli_fetch_assoc($keyword_set)){
                                                echo "<option value=\"" . h($keyword['id']) . "\"";
                                                if($post['keywords_id'] == $keyword['id'] ){ echo "selected"; }
                                                echo ">" .h($keyword['name']) . "</option>";
                                            }  
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label name="visible">
                                            <input type="hidden" name="visible" value="0" />
                                            <input type="checkbox" name="visible" value="1"
                                                <?php if($post['visible'] === "1") {echo "checked";} ?> />Visible
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label name="content">Content</label>
                                    <textarea id="summernote" name="content"
                                        class="form-control"><?php echo h($post['content']); ?></textarea>
                                </div>
                        </div>
                    </div>
                    </form>
                </div> <!-- /.end of col-md-8-->

                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                        </div>
                        <div class="card-body card-body-style">
                            <dl class="row">
                                <dt class="col-md-5">Post ID:</dt>
                                <dd class="col-md-7"><?php echo h($post['id']); ?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5">Create At:</dt>
                                <dd class="col-sm-7">
                                    <?php echo h(date('M j, Y h:i a', strtotime($post['timestamp']))); ?>
                                </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5">Last Updated:</dt>
                                <dd class="col-sm-7"><?php echo h(date('M j, Y h:i a')); ?></dd>
                            </dl>
                            <div class="row">
                                <div class="col-md-6">
                                    <a type="button" class="btn btn-warning btn-block"
                                        href="<?php echo url_for('/user/posts/index.php'); ?>">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <button form="edit-form" type="submit" class="btn btn-success btn-block">Save
                                        Changes</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- /. end of col 4 -->
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $("#summernote").summernote({
            placeholder: 'Start create your content...',
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']],
            ],
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    for (var i = files.length - 1; i >= 0; i--) {
                        sendFile(files[i], this);
                    }
                }
            }
        });
        $('#summernote').summernote('fontName', 'Arial');
    });

    function sendFile(file, el) {
        var form_data = new FormData();
        form_data.append('file', file);
        $.ajax({
            data: form_data,
            type: "POST",
            url: '../summernote/editor_upload.php',
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                $(el).summernote('editor.insertImage', url);
            }
        });
    }
    </script>

    <?php 
//include(SHARED_PATH . '/global_footer.php'); 
include(PUBLIC_PATH . '/dashboard/includes/scripts.php'); 
include(PUBLIC_PATH . '/dashboard/includes/admin_footer.php'); 
?>