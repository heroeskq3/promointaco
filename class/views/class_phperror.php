<?php
$phperror = null;
if (isset($_SESSION['phperror'])) {
    $phperror = $_SESSION['phperror'];
}
?>
<?php if($phperror){ ?>
<!--Accordion -->
<div id="content" class="pmd-content">
    <div class="container-fluid">
        <!-- Accordion with colored icon-->
        <section class="row component-section">
            <div class="col-md-0">
                <!--Accordion with colored icon code and example  -->
                <div class="component-box">
                    <!--Accordion with colored icon example -->
                    <div class="panel panel-danger">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title"><a  data-toggle="collapse" data-parent="#accordion4" href="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4"  data-expandable="false">

                                <i class="material-icons pmd-sm pmd-accordion-icon-left">visibility</i> PHP ERROR</a> </h4>
                        </div>
                        <div id="collapseTwo4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <?php
                                echo "<pre>";
                                print_r($_SESSION['phperror']);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Accordion with colored icon code and example end -->
            </div>
        </section>
        <!-- Accordion with colored icon end -->
    </div>
</div>
<!--Accordion constructor end -->
<?php unset($_SESSION['phperror']); ?>
<?php } ?>