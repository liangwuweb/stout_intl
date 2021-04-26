<!-- Hero Video Header -->
<div class="video-wrap">
    <video id="video" class="hero-video" preload="none" autoplay playsinline muted>
        <source src="<?php echo url_for('/assets/video/drone.mp4'); ?>" type="video/mp4">
        <source src="<?php echo url_for('/assets/video/drone.webm'); ?>" type="video/webm">
    </video>
    <div class="overlay">
        <div class="container-fluid mt-4">
            <div class="row flex-center">
                <div class="col-sm-12 col-md-8 px-4 text-center">
                    <h1 style="font-size:3.3rem; font-weight:900;"><span id="js-rotating" style="text-transform:uppercase;">WELCOME, välkommen, Bienvenue,
                            欢迎, 환영합니다, Willkommen, 歓迎, رحب بـ</span> TO STOUT GLOBAL</h1>
                    <p class="lead my-3">Provide a place to help international students at UW-Stout share their experiences and communicate with each other.</p>
                    <p>
                        <a class="btn btn-lg btn-primary btn-header" href="<?php echo url_for('/about.php'); ?>" role="button">DISCOVER
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>