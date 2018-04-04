<?php if ($sectionParams['section_style']) {?>
</fieldset>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Top menu -->
<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if (CONFIG_LOGOFOOTER) {?>
            <a href="index.html"><img src="<?php echo PATH_ASSETS . 'img/logos/' . CONFIG_LOGOFOOTER; ?>" alt="" width="230" class="img_colorfill "></a>
            <?php }?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <span class="li-text">
                            </span>
                    <a href="<?php echo CONFIG_LICENSEDUNDER; ?>"><strong><?php echo CONFIG_METATITTLE; ?></strong></a>
                    <span class="li-text">
                                <?php echo CONFIG_FOOTER; ?>
                            </span>
                    <span class="li-social">
                                <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php }?>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
    </body>
</html>