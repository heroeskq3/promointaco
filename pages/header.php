<?php
//System includes
if($section_restrict){
    require_once('../includes/restrict.php');
}
require_once('../includes/config.php');
require_once('../includes/globals.php');

//html header
require_once('html.php');
?>
<?php if($section_style==1){ ?>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        <?php
        if($section_navbar){
            require_once('navbar.php');
        }
        if($section_sidebar){
            require_once('sidebar.php');
        }
        ?>
    </nav>
    <div id="page-wrapper">
        <?php if($section_tittle){ ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $section_tittle; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <?php } ?>
<?php } ?>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>