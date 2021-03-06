<!DOCTYPE html>

<html lang="en">

<head>
    <title>Stout<?php if(isset($page_title)) { echo ' | ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" type="text/css"
        href="<?php echo url_for('/stylesheets/sticky-footer-navbar.css'); ?>" />
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo url_for('/stylesheets/normalize.css'); ?>" />
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo url_for('/stylesheets/user.css'); ?>" />
    <link href="<?php echo url_for('/dashboard/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo url_for('/stylesheets/parsley.css'); ?>" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
    <script src="<?php echo url_for('/js/parsley.min.js'); ?>"></script>
    <!-- Custom Fonts for home page -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo url_for('/stylesheets/blog.css'); ?>" />
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo url_for('/stylesheets/sticky-nav.css'); ?>" />
    <script>
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('.nav-wrap').addClass("sticky");
            $('.dropdown-menu').addClass("lift-menu")
            $('.site-logo').attr('src', './assets/brand/bootstrap-solid.svg');
        } else {
            $('.nav-wrap').removeClass("sticky");
            $('.dropdown-menu').removeClass("lift-menu");
            $('.site-logo').attr('src', './assets/brand/bootstrap-solid-blue.svg');
        }
    });
    $(document).ready(function() {
        $('.account-btn').click(function() {
            $('.account-btn').toggleClass('add-color');
            $('.arrow').toggleClass('up');
            $('.dropdown-item').toggleClass('effect');
            $('.dropdown-item:nth-child(1)').css({
                'animation': 'animate 200ms ease-in-out forwards',
                'animation-delay': '-200ms'
            });
            $('.dropdown-item:nth-child(2)').css({
                'animation': 'animate 200ms ease-in-out forwards',
                'animation-delay': '0ms'
            });
            $('.dropdown-item:nth-child(3)').css({
                'animation': 'animate 200ms ease-in-out forwards',
                'animation-delay': '200ms'
            });
        })
    })
    </script>
</head>

<body class="d-flex flex-column">
    <header class="nav-wrap transition">
        <nav class="navbar navbar-expand-lg navbar-light transition nav-extra-2">
            <!-- <div class="container"> -->
            <nav class="navbar" style="background: transparent; padding: .5rem 2rem;">
                <a class="navbar-brand blog-header-logo text-white transition"
                    href="<?php echo url_for('/index.php'); ?>">
                    <img src="<?php echo url_for('/assets/brand/bootstrap-solid-blue.svg'); ?>" width="30" height="30"
                        class="d-inline-block align-top transition site-logo" alt="">
                    &nbsp;Stout Global
                </a>
            </nav>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php 
                //Get http requested url
                $request_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                //echo $request_link;
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav ml-auto nav-pills">
                    <li class="nav-item transition">
                        <a class="highlight nav-link nav-header <?php if($request_link == 'http://localhost/stout_intl/public/about.php') {echo 'active';} ?>"
                            href="<?php echo url_for('/about.php'); ?>">About</a>
                    </li>
                    <li class="nav-item dropdown nav-header transition">
                        <a class="account-btn highlight nav-link nav-header dropdown-toggle <?php compare_request_url($request_link); ?>"
                            style="padding-right: 1.6rem;" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <?php if(is_logged_in()) {?>
                            <img src="<?php echo url_for('assets/image/profile.svg'); ?>" class="profile-nav-pic"
                                alt="user-icon">
                            <?php } else { ?>
                            Account
                            <?php } ?>
                            <div class="arrow transition"></div>
                        </a>
                        <div class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
                            <?php if(!is_logged_in()) {?>
                            <a class="dropdown-item" href="<?php echo url_for("/user/login.php"); ?>">Sign In</a>
                            <a class="dropdown-item" href="#">Create New Account</a>
                            <?php } ?>
                            <?php if(is_logged_in()) {?>
                            <a class="dropdown-item" href="#"><?php echo $_SESSION['username'] ?? ''; ?></a>
                            <a class="dropdown-item" href="<?php echo url_for('/dashboard/index.php'); ?>">Dashboard</a>
                            <a class="dropdown-item" href="<?php echo url_for('/user/logout.php'); ?>">Logout</a>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
            </div> <!-- /.nav-collapse -->
            <!-- </div> -->
        </nav>
    </header>