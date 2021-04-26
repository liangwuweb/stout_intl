<div class="svg-border-rounded text-dark">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="#0a1f2c">
        <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" /></svg>
</div>
<footer class="footer mt-auto pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="icon-container">
                    <span class="fa-stack">
                        <a href="https://www.facebook.com/bridgesinternationaluwstout/">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>

                    <span class="fa-stack">
                        <a href="https://www.uwstout.edu/academics/office-international-education">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-globe-americas fa-stack-1x"></i>
                        </a>
                    </span>

                    <span class="fa-stack">
                        <a href="https://www.instagram.com/uwstoutinternational/">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-instagram fa-stack-1x"></i>
                        </a>
                    </span>

                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-github-alt fa-stack-1x"></i>
                        </a>
                    </span>
                </div> <!-- end of col -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-md-12 text-center py-4">



                <div class="text-muted"> Stout Global &nbsp; &bull; &nbsp; Designed and Developed by <span class="text-main">Liang
                        Wu</span>
                </div>
                <div class="text-muted"> MFAiD Thesis Project &nbsp;&bull; &nbsp; Copyright &copy
                    <?php echo date('Y'); ?>
                </div>

            </div>
        </div>

    </div>
</footer>

<!-- Morphtext rotating text in the header -->
<script src="<?php echo url_for('/js/morphext.min.js'); ?>"></script>

<script>
    /* Rotating Text - Morphtext */
    $("#js-rotating").Morphext({
        // The [in] animation type. Refer to Animate.css for a list of available animations.
        animation: "fadeIn",
        // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
        separator: ",",
        // The delay between the changing of each phrase in milliseconds.
        speed: 2000,
        complete: function() {
            // Called after the entrance animation is executed.
        }
    });

    var video = document.querySelector("#video");

    video.addEventListener("timeupdate", function() {
        // check whether we have passed 5 minutes,
        // current time is given in seconds
        if (this.currentTime >= 16) {
            // pause the playback
            this.pause();
        }
    });
</script>
</body>

</html>

<?php db_disconnect($db); ?>