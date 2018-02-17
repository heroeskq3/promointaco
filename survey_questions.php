<?php
//Section Parameters
$section_tittle      = "Survey";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$step                = 5;
?>
<?php require_once 'header.php';?>
<?php
if ($button == 'next') {
    header('Location: survey_thanks.php');
    die();
}
if ($button == 'previous') {
    header('Location: survey_register.php');
    die();
}
?>
    <form role="form" action="" method="post">
        <fieldset>
            <?php class_tableSurveys($_SESSION['SurveyId']);?>
            <div class="f1-buttons">
        <?php
//buttons
$formButtons = array(
    'Previous' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' => 'button', 'value' => 'previous', 'action' => 'survey_services.php'),
    'Next'     => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' => 'button', 'value' => 'next', 'action' => null),
);
class_surveyButtons($formButtons);
?>
            </div>
        </fieldset>
</form>
<?php require_once 'footer.php';?>