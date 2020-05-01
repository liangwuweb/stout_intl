<?php
require_once('../../../private/initialize.php');

if(empty($_FILES['file']))
{
    exit();
}
//$errorImgFile = "./img/img_upload_error.jpg";
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$destinationFilePath = (PUBLIC_PATH . '/user/summernote/img_uploads/' . $newfilename);
if(move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)) {
    echo url_for('/user/summernote/img_uploads/') . $newfilename;
} 
 
?>