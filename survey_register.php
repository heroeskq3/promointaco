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
    $CustomInfo1    = $row_surveycustomersinfo['CustomInfo1'];
    $CustomInfo2    = $row_surveycustomersinfo['CustomInfo2'];
    $CustomInfo3    = $row_surveycustomersinfo['CustomInfo3'];
    $CustomInfo4    = $row_surveycustomersinfo['CustomInfo4'];
    $CustomInfo5    = $row_surveycustomersinfo['CustomInfo5'];
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

$array_CustomInfo1 = null;
$array_CustomInfo2 = null;
$array_CustomInfo3 = null;
$array_CustomInfo4 = null;

//¿Cuánto tiempo tiene de comprar INTACO?
$array_CustomInfo5   = array();
$array_CustomInfo5[] = array('label' => 'Menos de 1 año', 'value' => 'Menos de 1 año', 'selected' => $CustomInfo5);
$array_CustomInfo5[] = array('label' => 'Entre 1 y 3', 'value' => 'Entre 1 y 3', 'selected' => $CustomInfo5);
$array_CustomInfo5[] = array('label' => 'Entre 3 y 5', 'value' => 'Entre 3 y 5', 'selected' => $CustomInfo5);
$array_CustomInfo5[] = array('label' => 'Entre 5 y 10 años', 'value' => 'Entre 5 y 10 años', 'selected' => $CustomInfo5);
$array_CustomInfo5[] = array('label' => 'Más de 10 años', 'value' => 'Más de 10 años', 'selected' => $CustomInfo5);

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
    'Puesto en la empresa'            => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'Position', 'value' => $array_Position),

    'Asesor de Ventas que lo atiende' => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'CustomInfo1', 'value' => $array_CustomInfo1),
    'Fabrica adonde compra'           => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'CustomInfo2', 'value' => $array_CustomInfo2),
    'Provincia'                       => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'CustomInfo3', 'value' => $array_CustomInfo3),
    'Cantón'                          => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'CustomInfo4', 'value' => $array_CustomInfo4),
    'Tiempo de comprar en INTACO'     => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'CustomInfo5', 'value' => $array_CustomInfo5),

    'Country'                         => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Country', 'value' => $ZonesId),

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

require_once 'footer.php';
