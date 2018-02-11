<?php
//Section Parameters
$section_tittle      = "Page Tittle";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';
?>
    <?php require_once 'header.php';?>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Area Chart Example
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="morris-area-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bar Chart Example
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="morris-bar-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Line Chart Example
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="morris-line-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Donut Chart Example
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Morris.js Usage
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <p>Morris.js is a jQuery based charting plugin created by Olly Smith. In SB Admin, we are using the most recent version of Morris.js which includes the resize function, which makes the charts fully responsive. The documentation for Morris.js is available on their website, <a target="_blank" href="http://morrisjs.github.io/morris.js/">http://morrisjs.github.io/morris.js/</a>.</p>
                    <a target="_blank" class="btn btn-default btn-lg btn-block" href="http://morrisjs.github.io/morris.js/">View Morris.js Documentation</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    <?php require_once 'footer.php';?>
    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>