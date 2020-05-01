<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stout<?php if(isset($page_title)) { echo ' | ' . h($page_title); } ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo url_for('/dashboard/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo url_for('/dashboard/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo url_for('/dashboard/css/custom.css'); ?>" />


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo url_for('/dashboard/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo url_for('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>


    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

    <!-- jcf scripts and styles -->

    <script src="<?php echo url_for('/dashboard/js/jcf/jcf.js'); ?>"></script>
    <script src="<?php echo url_for('/dashboard/js/jcf/jcf.select.js'); ?>"></script>
    <script src="<?php echo url_for('/dashboard/js/jcf/jcf.checkbox.js'); ?>"></script>
    <script src="<?php echo url_for('/dashboard/js/jcf/jcf.scrollable.js'); ?>"></script>

    <script>
    $(function() {
        jcf.replaceAll();
    });
    </script>
    <link rel="stylesheet" href="<?php echo url_for('/dashboard/css/jcf.css'); ?>">
</head>

<body id="page-top">
    <?php //echo display_session_message(); ?>
    <!-- Page Wrapper -->
    <div id="wrapper">