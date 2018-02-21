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
<fieldset>
            <br>
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
$modalsParams = array(
    'label'  => 'Ver reglamento',
    'tittle' => 'Términos y Condiciones',
    'style'  => null,
    'body'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo error ratione adipisci, maiores excepturi aut voluptatibus veniam nemo ipsam? Blanditiis atque soluta qui consequatur hic incidunt autem iste voluptas? Ipsum.',
);

$modalsButtons = array(
    'Close' => array('label' => 'Close', 'type' => 'close', 'action' => null),
);
class_modals($modalsParams, $modalsButtons);

$formFields = array(
    'SurveyId' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'SurveyId', 'value' => $SurveyId),
);

// define buttons for form
$formButtons = array(
    'Previous' => array('buttonType' => 'link', 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_services.php'),
    'Next'     => array('buttonType' => 'submit', 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => null,
    'action'  => null,
    'method'  => 'post',
    'enctype' => null,
);

class_formGenerator2($formParams, $formFields, $formButtons);
?>
</fieldset>
<?php
require_once 'footer.php';?>