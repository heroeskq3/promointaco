<?php
//Section Parameters
$section_tittle      = "Register";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 4;

require_once 'header.php';

//restrict
if (!$_SESSION['TermsId']) {
    header('Location: survey_terms.php');
    die();
}
if ($form_add) {
    $surveycustomersadd = class_surveyCustomersAdd($FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $CustomInfo4, $CustomInfo2, $Country, $SessionId, $Status);

    if ($surveycustomersadd['rows']) {

        //customers info by session id
        $surveycustomerssessionid     = class_surveyCustomersSessionId($SessionId);
        $row_surveycustomerssessionid = $surveycustomerssessionid['response'][0];

        $_SESSION['CustomersId'] = $row_surveycustomerssessionid['Id'];
        header('Location: survey_questions.php');
        die();
    }
}
if ($form_update) {
    $surveycustomersupdate = class_surveyCustomersUpdate($CustomersId, $Company, $FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $CustomInfo4, $CustomInfo2, $Country, $Status);

    header('Location: survey_questions.php');
    die();
}

//Customers Info for Update
if (isset($_SESSION['CustomersId'])) {
    $surveycustomersinfo     = class_surveyCustomersInfo($_SESSION['CustomersId']);
    $row_surveycustomersinfo = $surveycustomersinfo['response'][0];

    $form_action = 'form_update';

    $CustomersId    = $row_surveycustomersinfo['Id'];
    $FirstName      = $row_surveycustomersinfo['FirstName'];
    $LastName       = $row_surveycustomersinfo['LastName'];
    $Identification = $row_surveycustomersinfo['Identification'];
    $Phone          = $row_surveycustomersinfo['Phone'];
    $Email          = $row_surveycustomersinfo['Email'];
    $Company        = $row_surveycustomersinfo['Company'];
    $Position       = $row_surveycustomersinfo['Position'];
    $CustomInfo4    = $row_surveycustomersinfo['CustomInfo4'];
    $CustomInfo2    = $row_surveycustomersinfo['CustomInfo2'];
    $Country        = $row_surveycustomersinfo['Country'];
    $Status         = $row_surveycustomersinfo['Status'];
} else {
    $form_action = 'form_add';
}

//Position
$array_Position   = array();
$array_Position[] = array('label' => 'Dueño', 'value' => 'Dueño', 'selected' => $Position);
$array_Position[] = array('label' => 'Gerente General / Administrador', 'value' => 'Gerente General / Administrador', 'selected' => $Position);
$array_Position[] = array('label' => 'Comprador', 'value' => 'Comprador', 'selected' => $Position);
$array_Position[] = array('label' => 'Vendedor', 'value' => 'Vendedor', 'selected' => $Position);

//¿Cuánto tiempo tiene de comprar INTACO?
$array_CustomInfo2   = array();
$array_CustomInfo2[] = array('label' => 'Menos de 1 año', 'value' => 'Menos de 1 año', 'selected' => $CustomInfo2);
$array_CustomInfo2[] = array('label' => 'Entre 1 y 3', 'value' => 'Entre 1 y 3', 'selected' => $CustomInfo2);
$array_CustomInfo2[] = array('label' => 'Entre 3 y 5', 'value' => 'Entre 3 y 5', 'selected' => $CustomInfo2);
$array_CustomInfo2[] = array('label' => 'Entre 5 y 10 años', 'value' => 'Entre 5 y 10 años', 'selected' => $CustomInfo2);
$array_CustomInfo2[] = array('label' => 'Más de 10 años', 'value' => 'Más de 10 años', 'selected' => $CustomInfo2);

//Country list
$countrylist       = class_countryList();
$array_countrylist = array();
foreach ($countrylist['response'] as $row_countrylist) {
    $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Prefix'], 'selected' => $Country);
}

$formFields = array(
    //hidden
    $form_action                      => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => $form_action, 'value' => 1),
    'ServicesId'                      => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'ServicesId', 'value' => $ServicesId),
    'CustomersId'                     => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'CustomersId', 'value' => $CustomersId),

    //active
    'Datos Personales'                => array('inputType' => 'label', 'required' => false, 'position' => 1, 'name' => 'Company', 'value' => $Company),
    'Nombre'                          => array('inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'FirstName', 'value' => $FirstName),
    'Apellidos'                       => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'LastName', 'value' => $LastName),
    'Nombre de identificación'        => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'Identification', 'value' => $Identification),
    'Número de teléfono'              => array('inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Phone', 'value' => $Phone),
    'Correo electrónico'              => array('inputType' => 'email', 'required' => false, 'position' => 2, 'name' => 'Email', 'value' => $Email),
    'Datos de la Empresa'             => array('inputType' => 'label', 'required' => false, 'position' => 1, 'name' => 'Company', 'value' => $Company),
    'Nombre de la empresa'            => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Company', 'value' => $Company),
    'Puesto en la empresa'            => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'Position', 'value' => $array_Position),
    'Asesor de Ventas que lo atiende' => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'CustomInfo4', 'value' => $CustomInfo4),
    'Tiempo de comprar en INTACO'     => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'CustomInfo2', 'value' => $array_CustomInfo2),
    'Country'                         => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Country', 'value' => $Country),
    'Status'                          => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Status', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    'Previous' => array('buttonType' => 'link', 'class' => null, 'name' => 'null', 'value' => null, 'action' => 'survey_terms.php'),
    'Next'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'Register',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);
?>
<fieldset>
<?php
class_formGenerator2($formParams, $formFields, $formButtons);
?>
</fieldset>
<?php
require_once 'footer.php';
