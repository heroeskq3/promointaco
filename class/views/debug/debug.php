<?php
$phperror = null;
if (isset($_SESSION['phperror'])) {
    $phperror   = $_SESSION['phperror'];
    $debug_show = 1;
}
$debug = null;
if (isset($_SESSION['debug'])) {
    $debug      = $_SESSION['debug'];
    $debug_show = 1;
}
?>
<div class="panel-body">
<?php if (isset($debug_show)) {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Debugger
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <?php if ($debug) {?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Output</a>
                                        </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
echo "<pre>";
        print_r($debug);
        ?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <?php if ($phperror) {
        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">PHP Waring / Error</a>
                                        </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                <?php
echo "<pre>";
        print_r($phperror);
        ?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
<?php
unset($_SESSION['phperror']);
unset($_SESSION['debug']);
?>
<?php }?>
</div>