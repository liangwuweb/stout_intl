<?php require_once('../../../private/initialize.php'); 
?>
<?php require_login(); ?>

<?php 
    if(is_post_request()) {
        $post = [];
        $post['title'] = $_POST['title'] ?? '';
        $post['keywords_id'] = $_POST['keywords'] ?? '';
        $post['visible'] = $_POST['visible'] ?? '';
        $post['content'] = $_POST['content'] ?? '';
        
        $result = insert_post($post);
        if($result === true) {
            $new_id = mysqli_insert_id($db);
            //the session message must set before redirect, becasue edirect will start a new http request, so we can store data into 
            //session through the redirect. After redirect, it is not possible to store the data to session.
            $_SESSION['message'] = 'The post was created successfully!';
            redirect_to(url_for('/user/posts/show.php?id=' . $new_id));
        } else {
            $errors = $result;
        }
        
    } else {
    }
?>

<?php $page_title = 'Create Post'; ?>
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
                            <h6 class="m-0 font-weight-bold text-primary">Create Post</h6>
                        </div>
                        <div class="card-body card-body-style">
                            <form id="edit-form" data-parsley-validate
                                action="<?php echo url_for('/user/posts/new.php'); ?>" method="post">
                                <div class="form-group">
                                    <!-- <label name="title">Title</label> -->
                                    <input required id="title" type="text" name="title" class="form-control"
                                        placeholder="Title" value="" />
                                </div>

                                <div class="form-group">
                                    <label name="keywords">Keywords</label>
                                    <select id="keywords" class="form-control" name="keywords"
                                        data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
                                        <!-- <option value="Keywords">Keywords</option> -->
                                        <?php 
                                            $keyword_set = find_all_keywords();
                                            while($keyword = mysqli_fetch_assoc($keyword_set)){
                                                echo "<option value=\"" . h($keyword['id']) . "\"";
                                                echo ">" .h($keyword['name']) . "</option>";
                                            }  
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">

                                    <label name="visible">
                                        <input type="hidden" name="visible" value="0" />
                                        <input type="checkbox" name="visible" value="1" />Visible
                                    </label>
                                </div>

                                <div class="form-group">
                                    <!-- <label name="content">Content</label> -->
                                    <textarea id="summernote" name="content" class="form-control"></textarea>
                                </div>

                                <!-- <input type="submit" class="btn btn-success btn-lg btn-block" value="Create Post" /> -->

                            </form>
                        </div>
                    </div>
                    <!-- /. End of Card -->
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
                                        href="<?php echo url_for('/user/posts/index.php'); ?>">Cancel</a>
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
        <!-- /. End of Container Fluid -->
    </div>
    <!-- /. End of Content -->


    <script>
    $(document).ready(function() {
        $("#summernote").summernote({
            placeholder: 'Start create your content',
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