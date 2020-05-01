<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/home_header.php'); ?>

<?php include(SHARED_PATH . '/hero_video.php'); ?>

<!-- Old Image Background  -->
<!-- <div class="jumbotron p-4 p-md-5 text-white rounded hero flex-center">
    <div class="col-md-7 px-0 text-center">
        <h1 style="font-size:3.3rem; font-weight:900;">WELCOME TO STOUT GLOBAL</h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
            efficiently
            about what’s most interesting in this post’s contents.</p>
        <p>
            <a class="btn btn-lg btn-primary btn-header" href="../../components/#navbar" role="button">DISCOVER
            </a>
        </p>
    </div>
</div> -->

<!-- About abstract -->
<div class="page-about">
    <div class="page-about-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2 class="page-about-title text-main mb-2">Communicate with international student</h2>
                    <p class="page-about-text mb-5">Welcome Stout Global, a website aim to help international students
                        communicating and sharing their experiences at UW-Stout</p>
                    <a class="btn btn-lg btn-primary btn-header mt-n2" href="javascript:void(0);">Leaern More<svg
                            class="svg-inline--fa fa-arrow-right fa-w-14 ml-1" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z">
                            </path>
                        </svg></a>

                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <img class="img-fluid" src="<?php echo url_for('/assets/image/chat.svg'); ?>" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Posts -->
<main role="main" class="flex-shrink-0 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 blog-main pt-3">
                <h2 class="pt-5 pb-5 text-center text-main">
                    Recent Posts
                </h2>
            </div>
            <?php include(SHARED_PATH . '/public_posts.php'); ?>
        </div>
        <div class="row justify-content-center mt-5">
            <?php echo $paginator->createLinks( $links, 'pagination pagination-post pb-5' );?>
        </div>
    </div><!-- /. end of .container -->
</main><!-- /. end of main -->

<?php include(SHARED_PATH . '/contact.php'); ?>

<?php include(SHARED_PATH . '/global_footer.php'); ?>