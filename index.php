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
$step = 1;
?>
<?php require_once 'header.php';?>
<?php
if($button == 'next'){
    $_SESSION['Country'] = $_POST['Country'];
    header('Location: survey_services.php');
    die();
}
?>
<?php 
//Country list
function class_surveysCountry($Country){
    $countrylist       = class_countryList();
    $array_countrylist = array();
    foreach ($countrylist['response'] as $row_countrylist) {
        $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Prefix'], 'selected' => $Country);
    }
    echo class_formInput('select', 'Country', 'Select your country', $array_countrylist, 'required');
}
?>
<form role="form" action="" method="post">
        <fieldset>
            <h3>¡Bienvenidos al portal de Experiencia INTACO!</h3>
            <p>Un portal en donde todas sus recomendaciones son bienvenidas.</p>
            <h5><strong>Su retroalimentación nos ayuda a cumplir nuestra promesa de valor:</strong></h5>
            <ul>
                <li>INTACO es cercano</li>
                <li>INTACO se preocupa</li>
                <li>INTACO trabaja para hacer crecer a sus clientes</li>
            </ul>
            <hr>
            <h3>Please select country:</h3>
            <div class="form-group select-country">
                <?php echo class_surveysCountry($Country) ?>
            </div>
            <div class="f1-buttons">
        <?php
        //buttons
        $formButtons = array(
            'Next'     => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' =>'button', 'value' =>'next', 'action' => null),
        );
        class_surveyButtons($formButtons);
        ?>
            </div>
        </fieldset>
</form>
<?php require_once 'footer.php';?>