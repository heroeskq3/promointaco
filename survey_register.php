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

if ($form_add) {
    $token = new Token();

    $customersadd = class_customersAdd($Identification, $FirstName, $LastName, $MiddleName, $Company, $Position, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status);

    if ($customersadd['rows']) {

        $_SESSION['token'] = $token->make();

        header('Location: survey_questions.php');
        die();
    }
}

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

    //active
    'Datos Personales'                => array('inputType' => 'label', 'required' => false, 'position' => 1, 'name' => 'Company', 'value' => isset($Company)),
    'Nombre'                          => array('inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'FirstName', 'value' => isset($FirstName)),
    'Apellidos'                       => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'LastName', 'value' => isset($LastName)),
    'Nombre de identificación'        => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'Identification', 'value' => isset($Identification)),
    'Número de teléfono'              => array('inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Phone', 'value' => isset($Phone)),
    'Correo electrónico'              => array('inputType' => 'email', 'required' => false, 'position' => 2, 'name' => 'Email', 'value' => isset($Email)),
    
    'Datos de la Empresa'             => array('inputType' => 'label', 'required' => false, 'position' => 1, 'name' => 'Company', 'value' => isset($Company)),
    'Nombre de la empresa'            => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Company', 'value' => isset($Company)),
    'Puesto en la empresa'            => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'Position', 'value' => $array_Position),
    'Asesor de Ventas que lo atiende' => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'CustomInfo4', 'value' => isset($CustomInfo4)),
    'Tiempo de comprar en INTACO'     => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'CustomInfo2', 'value' => $array_CustomInfo2),
    'Country'                         => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Country', 'value' => isset($Country)),

    //Inactive
    'Mobile'                          => array('inputType' => 'tel', 'required' => false, 'position' => 0, 'name' => 'Mobile', 'value' => isset($Mobile)),
    'Tipo'                            => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'CustomInfo3', 'value' => isset($CustomInfo3)),
    'Zone'                            => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'CustomInfo1', 'value' => isset($CustomInfo1)),
    'Responsible'                     => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Responsible', 'value' => isset($Responsible)),
    'Middle Name'                     => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'MiddleName', 'value' => isset($MiddleName)),
    'State'                           => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'State', 'value' => isset($State)),
    'City'                            => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'City', 'value' => isset($City)),
    'Address'                         => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Address', 'value' => isset($Address)),
    'Details'                         => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Details', 'value' => isset($Details)),
    'CustomInfo5'                     => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'CustomInfo5', 'value' => isset($CustomInfo5)),
    'Image'                           => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Image', 'value' => isset($Image)),
    'Status'                          => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Status', 'value' => isset($Status)),
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
