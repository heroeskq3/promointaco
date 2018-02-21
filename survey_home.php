<?php
//Section Parameters
$section_tittle      = "Welcome";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 1;

require_once 'header.php';

if ($button == 'next') {
    echo "hola2";
    $_SESSION['Country'] = $_POST['Country'];
    header('Location: survey_services.php');
    die();
}
?>
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

<?php
//Country list
function class_surveysCountry($Country)
{
    $countrylist       = class_countryList();
    $array_countrylist = array();
    foreach ($countrylist['response'] as $row_countrylist) {
        $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Prefix'], 'selected' => $Country);
    }
    echo class_formInput('select', 'Country', 'Select your country', $array_countrylist, 'required');
}

//Country list
$countrylist       = class_countryList();
$array_countrylist = array();
foreach ($countrylist['response'] as $row_countrylist) {
    $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Prefix'], 'selected' => $Country);
}

$formFields = array(
    'Country' => array('inputType' => 'select', 'required' => true, 'position' => 4, 'name' => 'Country', 'value' => $array_countrylist),
);

// define buttons for form
$formButtons = array(
    'Next' => array('buttonType' => 'submit', 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => null,
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator2($formParams, $formFields, $formButtons);
?>
</fieldset>
<?php
require_once 'footer.php';?>