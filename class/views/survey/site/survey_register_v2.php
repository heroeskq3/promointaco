<?php
//restrict
if (!$_SESSION['TermsId']) {
    header('Location: survey_terms.php');
    die();
}

if ($form_add) {

    if ($State) {
        $surveyzonesinfo     = class_surveyZonesInfo($State);
        $row_surveyzonesinfo = $surveyzonesinfo['response'][0];
        $State               = $row_surveyzonesinfo['Name'];
    }
    if ($Workarea) {
        $surveyworkareainfo     = class_surveyWorkareasInfo($Workarea);
        $row_surveyworkareainfo = $surveyworkareainfo['response'][0];
        $Workarea               = $row_surveyworkareainfo['Name'];
    }

    $surveycustomersadd = class_surveyCustomersAdd($FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $Workarea, $Profession, $Care, $Local, $CustomInfo1, $Country, $State, $City, $SessionId, $Status);

    if ($surveycustomersadd['rows']) {

        //customers info by session id
        $surveycustomerssessionid     = class_surveyCustomersSessionId($SessionId);
        $row_surveycustomerssessionid = $surveycustomerssessionid['response'][0];

        $_SESSION['CustomersId'] = $row_surveycustomerssessionid['Id'];
        header('Location: survey_thanks.php');
        die();
    }
}
if ($form_update) {
    $surveycustomersupdate = class_surveyCustomersUpdate($CustomersId, $FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $Workarea, $Profession, $Care, $Local, $CustomInfo1, $Country, $State, $City, $SessionId, $Status);

    header('Location: survey_thanks.php');
    die();
}

//Customers Info for Update
if (isset($_SESSION['CustomersId'])) {
    $surveycustomersinfo     = class_surveyCustomersInfo($_SESSION['CustomersId']);
    $row_surveycustomersinfo = $surveycustomersinfo['response'][0];
    $form_action             = 'form_update';
    $CustomersId             = $row_surveycustomersinfo['Id'];
    $FirstName               = $row_surveycustomersinfo['FirstName'];
    $LastName                = $row_surveycustomersinfo['LastName'];
    $Identification          = $row_surveycustomersinfo['Identification'];
    $Phone                   = $row_surveycustomersinfo['Phone'];
    $Email                   = $row_surveycustomersinfo['Email'];
    $Company                 = $row_surveycustomersinfo['Company'];
    $Position                = $row_surveycustomersinfo['Position'];
    $Workarea                = $row_surveycustomersinfo['Workarea'];
    $Profession              = $row_surveycustomersinfo['Profession'];
    $Care                    = $row_surveycustomersinfo['Care'];
    $Local                   = $row_surveycustomersinfo['Local'];
    $State                   = $row_surveycustomersinfo['State'];
    $City                    = $row_surveycustomersinfo['City'];
    $CustomInfo1             = $row_surveycustomersinfo['CustomInfo1'];
    $Country                 = $row_surveycustomersinfo['Country'];
    $Status                  = $row_surveycustomersinfo['Status'];
} else {
    $form_action = 'form_add';
}

//cares LANG_LIST
$surveycareslist = class_surveyCaresList($ZonesId);

//FILTER BY STATUS
$surveycareslist = $surveycareslist['response'];
$surveycareslist = class_arrayFilter($surveycareslist, 'Status', '1', '=');

//FILTER BY ZONES
$surveycareslist = $surveycareslist['response'];
$surveycareslist = class_arrayFilter($surveycareslist, 'ZonesId', $ZonesId, 'all');

$array_cares = array();
if ($surveycareslist['rows']) {
    foreach ($surveycareslist['response'] as $row_surveycareslist) {
        $array_cares[] = array('label' => $row_surveycareslist['Name'], 'value' => $row_surveycareslist['Name'], 'selected' => $Care);
    }
}

//locals LANG_LIST
$surveylocalslist = class_surveyLocalsList($ZonesId);

//FILTER BY STATUS
$surveylocalslist = $surveylocalslist['response'];
$surveylocalslist = class_arrayFilter($surveylocalslist, 'Status', '1', '=');

//FILTER BY ZONES
$surveylocalslist = $surveylocalslist['response'];
$surveylocalslist = class_arrayFilter($surveylocalslist, 'ZonesId', $ZonesId, 'all');

$array_locals = array();
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

//WORKAREAS
$workareaslist     = class_surveyWorkareasList($ZonesId);
$workareaslist     = class_arrayFilter($workareaslist['response'], 'Status', '1', '=');
$array_workareas   = array();
$array_professions = array();
if ($workareaslist['rows']) {
    foreach ($workareaslist['response'] as $row_workareaslist) {
        $array_workareas[] = array('label' => $row_workareaslist['Name'], 'value' => $row_workareaslist['Id'], 'selected' => $Workarea);
    }
}

//PROFESSIONS
$professionslist = class_surveyProfessionsList();
//echo "<pre>";
//print_r($professionslist);
$professionslist = class_arrayFilter($professionslist['response'], 'Status', '1', '=');
if ($professionslist['rows']) {
    foreach ($professionslist['response'] as $row_professionslist) {
        $array_professions[] = array('patern' => $row_professionslist['WorkareaId'], 'label' => $row_professionslist['Name'], 'value' => $row_professionslist['Name'], 'selected' => $Profession);
    }
}

//STATES
$stateslist   = class_surveyZonesList($ZonesId);
$stateslist   = class_arrayFilter($stateslist['response'], 'Status', '1', '=');
$array_states = array();
$array_cities = array();
if ($stateslist['rows']) {
    foreach ($stateslist['response'] as $row_stateslist) {
        $array_states[] = array('label' => $row_stateslist['Name'], 'value' => $row_stateslist['Id'], 'selected' => $ZonesId);

        //CITIES
        $citieslist = class_surveyZonesList($row_stateslist['Id']);
        $citieslist = class_arrayFilter($citieslist['response'], 'Status', '1', '=');
        if ($citieslist['rows']) {
            foreach ($citieslist['response'] as $row_citieslist) {
                $array_cities[] = array('patern' => $row_citieslist['ZonesId'], 'label' => $row_citieslist['Name'], 'value' => $row_citieslist['Name'], 'selected' => $ZonesId);
            }
        }

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
    //HIDDEN
    $form_action             => array('placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => $form_action, 'value' => 1),
    'ServicesId'             => array('placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'ServicesId', 'value' => $ServicesId),
    'CustomersId'            => array('placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'CustomersId', 'value' => $CustomersId),

    //PERSONAL INFORMATION
    LANG_PERSONALINFORMATION => array('placeholder' => null, 'inputType' => 'label', 'required' => true, 'position' => 1, 'name' => 'Company', 'value' => $Company),

    LANG_NAME                => array('placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'FirstName', 'value' => $FirstName),
    LANG_LASTNAME            => array('placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'LastName', 'value' => $LastName),
    LANG_IDENTIFICATION      => array('placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'Identification', 'value' => $Identification),
    LANG_PHONENUMBER         => array('placeholder' => null, 'inputType' => 'tel', 'required' => true, 'position' => 2, 'name' => 'Phone', 'value' => $Phone),
    LANG_ELECTRONICMAIL      => array('placeholder' => null, 'inputType' => 'email', 'required' => true, 'position' => 2, 'name' => 'Email', 'value' => $Email),
    LANG_BUSINESSNAME        => array('placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'Company', 'value' => $Company),

    LANG_WORKAREA            => array('placeholder' => null, 'inputType' => 'select_onchange3', 'required' => true, 'position' => 3, 'name' => 'Workarea', 'value' => $array_workareas),
    LANG_PROFESSION          => array('placeholder' => null, 'inputType' => 'select_onchange4', 'required' => true, 'position' => 3, 'name' => 'Profession', 'value' => $array_professions),

    LANG_STATE               => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select_onchange1', 'required' => true, 'position' => 2, 'name' => 'State', 'value' => $array_states),
    LANG_CITY                => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select_onchange2', 'required' => true, 'position' => 2, 'name' => 'City', 'value' => $array_cities),

    //INACTIVE
    LANG_COUNTRY             => array('placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'Country', 'value' => $Country),
    LANG_STATUS              => array('placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'Status', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    LANG_BTNPREVIOUS => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => 'null', 'value' => null, 'action' => 'survey_terms.php'),
    LANG_BTNNEXT     => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => '',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator2($formParams, $formFields, $formButtons);
