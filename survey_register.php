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
//patch - for oNChange Select State / city
if ($StateId) {
    $surveystatesinfo     = class_surveyZonesInfo($StateId);
    $row_surveystatesinfo = $surveystatesinfo['response'][0];
    $State                = $row_surveystatesinfo['Name'];
}

if ($form_add) {

    $surveycustomersadd = class_surveyCustomersAdd($FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $Care, $Local, $CustomInfo1, $Country, $State, $City, $SessionId, $Status);

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
    $surveycustomersupdate = class_surveyCustomersUpdate($CustomersId, $FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $Care, $Local, $CustomInfo1, $Country, $State, $City, $SessionId, $Status);

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
    $Care           = $row_surveycustomersinfo['Care'];
    $Local          = $row_surveycustomersinfo['Local'];
    $State          = $row_surveycustomersinfo['State'];
    $City           = $row_surveycustomersinfo['City'];
    $CustomInfo1    = $row_surveycustomersinfo['CustomInfo1'];
    $Country        = $row_surveycustomersinfo['Country'];
    $Status         = $row_surveycustomersinfo['Status'];
} else {
    $form_action = 'form_add';
}

//positions List
$surveypositionslist = class_surveyPositionList($ZonesId);
$array_positions     = array();
if ($surveypositionslist['rows']) {
    foreach ($surveypositionslist['response'] as $row_surveypositionslist) {
        $array_positions[] = array('label' => $row_surveypositionslist['Name'], 'value' => $row_surveypositionslist['Name'], 'selected' => $Position);
    }
}

//cares List
$surveycareslist = class_surveyCaresList($ZonesId);
$array_cares     = array();
if ($surveycareslist['rows']) {
    foreach ($surveycareslist['response'] as $row_surveycareslist) {
        $array_cares[] = array('label' => $row_surveycareslist['Name'], 'value' => $row_surveycareslist['Name'], 'selected' => $Care);
    }
}

//locals List
$surveylocalslist = class_surveyLocalsList($ZonesId);
$array_locals     = array();
if ($surveylocalslist['rows']) {
    foreach ($surveylocalslist['response'] as $row_surveylocalslist) {
        $array_locals[] = array('label' => $row_surveylocalslist['Name'], 'value' => $row_surveylocalslist['Name'], 'selected' => $Local);
    }
}
//Country Info
$surveyzonesinfo     = class_surveyZonesInfo($ZonesId);
$row_surveyzonesinfo = $surveyzonesinfo['response'][0];
if ($surveyzonesinfo['rows']) {
    $Country = $row_surveyzonesinfo['Name'];
}

//patch - getid
if ($State && $Country) {
    $surveystatesname     = class_surveyZonesGetId($Country, $State);
    $row_surveystatesname = $surveystatesname['response'][0];
    $CountryId            = $row_surveystatesname['CountryId'];
    $StateId              = $row_surveystatesname['StateId'];
}

//states List
$surveystateslist = class_surveyZonesList($ZonesId);
$array_states     = array();
if ($surveystateslist['rows']) {
    foreach ($surveystateslist['response'] as $row_surveystateslist) {
        $array_states[] = array('label' => $row_surveystateslist['Name'], 'value' => $row_surveystateslist['Id'], 'selected' => $StateId);
    }
}
//cities List
$surveycitieslist = class_surveyZonesList($StateId);
$array_cities     = array();
if ($surveycitieslist['rows']) {
    foreach ($surveycitieslist['response'] as $row_surveycitieslist) {
        $array_cities[] = array('label' => $row_surveycitieslist['Name'], 'value' => $row_surveycitieslist['Name'], 'selected' => $City);
    }
}

//¿Cuánto tiempo tiene de comprar INTACO?
$array_CustomInfo1   = array();
$array_CustomInfo1[] = array('label' => 'Menos de 1 año', 'value' => 'Menos de 1 año', 'selected' => $CustomInfo1);
$array_CustomInfo1[] = array('label' => 'Entre 1 y 3', 'value' => 'Entre 1 y 3', 'selected' => $CustomInfo1);
$array_CustomInfo1[] = array('label' => 'Entre 3 y 5', 'value' => 'Entre 3 y 5', 'selected' => $CustomInfo1);
$array_CustomInfo1[] = array('label' => 'Entre 5 y 10 años', 'value' => 'Entre 5 y 10 años', 'selected' => $CustomInfo1);
$array_CustomInfo1[] = array('label' => 'Más de 10 años', 'value' => 'Más de 10 años', 'selected' => $CustomInfo1);

$formFields = array(
    //hidden
    $form_action                      => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => $form_action, 'value' => 1),
    'ServicesId'                      => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'ServicesId', 'value' => $ServicesId),
    'CustomersId'                     => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'CustomersId', 'value' => $CustomersId),

    //personales
    'Datos Personales'                => array('inputType' => 'label', 'required' => false, 'position' => 1, 'name' => 'Company', 'value' => $Company),
    'Nombre'                          => array('inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'FirstName', 'value' => $FirstName),
    'Apellidos'                       => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'LastName', 'value' => $LastName),
    'Nombre de identificación'        => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'Identification', 'value' => $Identification),
    'Número de teléfono'              => array('inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Phone', 'value' => $Phone),
    'Correo electrónico'              => array('inputType' => 'email', 'required' => false, 'position' => 2, 'name' => 'Email', 'value' => $Email),

    //Empresa
    'Datos de la Empresa'             => array('inputType' => 'label', 'required' => false, 'position' => 1, 'name' => 'Company', 'value' => $Company),
    'Nombre de la empresa'            => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Company', 'value' => $Company),
    'Puesto en la empresa'            => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'Position', 'value' => $array_positions),

    'Asesor de Ventas que lo atiende' => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'Care', 'value' => $array_cares),
    'Fabrica adonde compra'           => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'Local', 'value' => $array_locals),
    'Provincia'                       => array('inputType' => 'select_onchange', 'required' => false, 'position' => 2, 'name' => 'StateId', 'value' => $array_states),
    'Cantón'                          => array('inputType' => 'select_onchange2', 'required' => false, 'position' => 2, 'name' => 'City', 'value' => $array_cities),
    'Tiempo de comprar en INTACO'     => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'CustomInfo1', 'value' => $array_CustomInfo1),

    'Country'                         => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Country', 'value' => $Country),

    //Inactive
    'Status'                          => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Status', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    'Previous' => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => 'null', 'value' => null, 'action' => 'survey_terms.php'),
    'Next'     => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => '',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator2($formParams, $formFields, $formButtons);
?>
<?php
require_once 'footer.php';
