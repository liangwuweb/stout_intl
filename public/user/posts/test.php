<html lang="en">
<!DOCTYPE html>
<html>

<head>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

</head>

<body>
    <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <textarea id="summernote" name="content"></textarea>
            <input type="submit" value="Create Post" />
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $("#summernote").summernote({
            placeholder: 'Start create your content...',
            height: 300,
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
            url: 'editor_upload2.php',
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                $(el).summernote('editor.insertImage', url);
            }
        });
    }
    </script>
</body>

</html>