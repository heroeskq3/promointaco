<?php
//Section Parameters
$section_tittle      = "Page Tittle";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
?>
<?php
//class
require_once 'class_country.php';
require_once 'class_questions.php';
require_once 'class_answers.php';
require_once 'class_customers.php';
?>
<?php require_once 'header.php';?>
<?php
if ($form_add) {
    class_customersAdd($Identification, $FirstName, $LastName, $MiddleName, $Company, $Position, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status);
    header('Location: customers_list.php');
    die();
}
?>
        <!-- Top content -->
        <div class="top-content">
            <div class="container">

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1 form-box">
                        <form role="form" action="test.php" method="post" class="f1">
                            <div class="col-sm-12 text">
                                <a href="index.php"><img src="resources/site/cropped-logo-intaco.png" alt="" width="230"></a>
                            </div>
                            <h3><strong>SATISFACCIÓN</strong></h3>
                            <p>con la atención de su asesor de ventas</p>
                    <div class="f1-steps " >
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="12.5" data-number-of-steps="4" style="width: 12.5%;" ></div>
                        </div>
                        <div class="f1-step active" >
                            <div class="f1-step-icon" ><i class="fa fa-key"></i></div>
                            <p>start</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon" ><i class="fa fa-question"></i></div>
                            <p>questions</p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon" ><i class="fa fa-user"></i></div>
                            <p>register</p>
                        </div>
                        <div class="f1-step" >
                            <div class="f1-step-icon" ><i class="fa fa-twitter" ></i></div>
                            <p>thanks</p>
                        </div>
                    </div>
                            <fieldset>
                            <h4>Please select country:</h4>
                            <div class="form-group select-country">
                                <?php echo class_surveyCountry() ?>
                            </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>

                            </fieldset>

                            <fieldset>
                                <?php class_answers($Id);?>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Personal Information:</h4>

                                <?php echo class_customers($form_add, $Identification, $FirstName, $LastName, $MiddleName, $Company, $Position, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status); ?>

                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>VERY THANKS</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-facebook">VERY THANKS</label>
                                </div>

                            </fieldset>

                        </form>
                    </div>
                </div>

            </div>
        </div>
<?php require_once 'footer.php';?>