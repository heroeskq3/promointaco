<?php
//Section Parameters
$section_tittle      = "Booking";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$step                = 4;
?>
<?php require_once 'header.php';?>
<?php
if ($form_add) {
    $customersadd = class_customersAdd($Identification, $FirstName, $LastName, $MiddleName, $Company, $Position, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status);

    if ($customersadd['rows']) {

        $_SESSION['token'] = $token->make();

        header('Location: survey_questions.php');
        die();
    }
}
?>
<?php

//Status list
$Status         = 1;
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Position
$array_Position   = array();
$array_Position[] = array('label' => 'Dueño', 'value' => 'Dueño', 'selected' => null);
$array_Position[] = array('label' => 'Gerente General / Administrador', 'value' => 'Gerente General / Administrador', 'selected' => null);
$array_Position[] = array('label' => 'Comprador', 'value' => 'Comprador', 'selected' => null);
$array_Position[] = array('label' => 'Vendedor', 'value' => 'Vendedor', 'selected' => null);

//¿Cuánto tiempo tiene de comprar INTACO?
$array_CustomInfo2   = array();
$array_CustomInfo2[] = array('label' => 'Menos de 1 año', 'value' => 'Menos de 1 año', 'selected' => null);
$array_CustomInfo2[] = array('label' => 'Entre 1 y 3', 'value' => 'Entre 1 y 3', 'selected' => null);
$array_CustomInfo2[] = array('label' => 'Entre 3 y 5', 'value' => 'Entre 3 y 5', 'selected' => null);
$array_CustomInfo2[] = array('label' => 'Entre 5 y 10 años', 'value' => 'Entre 5 y 10 años', 'selected' => null);
$array_CustomInfo2[] = array('label' => 'Más de 10 años', 'value' => 'Más de 10 años', 'selected' => null);

//Tipo
$array_CustomInfo3   = array();
$array_CustomInfo3[] = array('label' => 'Distribuidor', 'value' => 'Distribuidor', 'selected' => null);
$array_CustomInfo3[] = array('label' => 'Constructor ', 'value' => 'Constructor ', 'selected' => null);
$array_CustomInfo3[] = array('label' => 'Cliente final', 'value' => 'Cliente final', 'selected' => null);

//Country list
$countrylist       = class_countryList();
$array_countrylist = array();
foreach ($countrylist['response'] as $row_countrylist) {
    $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Prefix'], 'selected' => 'CR');
}

//State list
$statelist       = class_stateList();
$array_statelist = array();
foreach ($statelist['response'] as $row_statelist) {
    $array_statelist[] = array('label' => $row_statelist['Name'], 'value' => $row_statelist['Id'], 'selected' => null);
}

$formFields = array(
    'form_add'                        => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Nombre'                          => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'FirstName', 'value' => isset($FirstName)),
    'Número de teléfono'              => array('inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Phone', 'value' => isset($Phone)),
    'Correo electrónico'              => array('inputType' => 'email', 'required' => false, 'position' => 1, 'name' => 'Email', 'value' => isset($Email)),
);

// define buttons for form
$formButtons = array(
    'Back' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' => 'button', 'value' => 'back', 'action' => null),
    'Next' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => null,
    'action'  => null,
    'method'  => null,
    'enctype' => null,
);

class_formGenerator($formParams, $formFields, $formButtons);

?>
<?php require_once 'footer.php';
