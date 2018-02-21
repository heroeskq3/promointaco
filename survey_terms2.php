<?php
//Section Parameters
$section_tittle      = "Terms";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 3;

require_once 'header.php';

if ($button == 'next') {
    header('Location: survey_register.php');
    die();
}

$surveyinfo     = class_surveyInfo($SurveyId);
$row_surveyinfo = $surveyinfo['response'][0];
?>
            <h3>Encuesta:</h3>
            <ul>
                <li>
                    <?php echo $row_surveyinfo['Name']; ?>
                </li>
            </ul>
            <hr>
            <h3>Comparte tu experiencia con nuestro servicio</h3>
            <h3>y queda participando en la rifa de:</h3>
            <ul>
                <li>30 ordenes de compra por ¢50.000</li>
            </ul>
            <hr>
            <h3>¿Cómo participar?</h3>
            <ul>
                <li>Ingresa tus datos personales y los del negocio adonde trabajas.</li>
                <li>Responde las 12 preguntas.</li>
                <li>Comparte tus comentarios finales.</li>
                <li>¡Listo! Quedas participando.</li>
            </ul>
            <hr>
            <h3>Fecha del sorteo</h3>
            <ul>
                <li>28 de mayo, 2018</li>
            </ul>
            <hr>
            <h3>Términos y Condiciones</h3>
<?php

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

);

// define buttons for form
$formButtons = array(
    'Previous' => array('buttonType' => 'link', 'class' => null, 'name' => 'null', 'value' => null, 'action' => 'survey_services.php'),
    'Next'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'Register',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator2($formParams, $formFields, $formButtons);

require_once 'footer.php';
