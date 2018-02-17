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
$step = 2;
?>
<?php require_once 'header.php';?>
<?php
if($button == 'next'){
    $_SESSION['SurveyId'] = $_POST['SurveyId'];
    header('Location: survey_terms.php');
    die();
}
if ($button == 'previous') {
    header('Location: index.php');
    die();
}
//Country list
function class_surveyservices($Country,$SurveyId){
    $surveyserviceslist = class_surveyServicesList($Country);
    $array_surveyserviceslist = array();
    foreach ($surveyserviceslist['response'] as $row_surveyserviceslist) {
        $array_surveyserviceslist[] = array('label' => $row_surveyserviceslist['Name'], 'value' => $row_surveyserviceslist['Id'], 'selected' => $SurveyId);
    }
    return class_formInput('select', 'SurveyId', 'Select Survey', $array_surveyserviceslist, 'required');
}
?>
<form role="form" action="" method="post">
	<input type="hidden" name="Country" value="<?php echo $Country;?>">
<fieldset>
	<h3>Comparte tu experiencia con nosotros.</h3>
	<ul>
		<li><h5>Aceptamos tus críticas constructivas.</h5></li>
		<li><h5>Agradecemos tu honestidad.</h5></li>
		<li><h5>Cualquier sugerencia que tengas nos ayuda a mejorar nuestro servicio. </h5></li>	
	</ul>
	<hr>
	<h3>Encuestas disponibles:</h3>
            <div class="form-group select-country">
                <?php echo class_surveyservices($Country,$SurveyId); ?>
            </div>
        <div class="f1-buttons">
        <?php
        //buttons
        $formButtons = array(
            'Previous' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' =>'button', 'value' =>'previous', 'action' => 'index.php'),
            'Next'     => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' =>'button', 'value' =>'next', 'action' => null),
        );
        class_surveyButtons($formButtons);
        ?>
        </div>
</fieldset>
</form>
<?php require_once 'footer.php';?>