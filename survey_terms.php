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

//restrict
if (!$_SESSION['ServicesId']) {
    header('Location: survey_services.php');
    die();
}
if (isset($_POST['TermsId'])) {
    $_SESSION['TermsId'] = $_POST['TermsId'];
    header('Location: survey_register.php');
    die();
}

if ($button == "next") {
    header('Location: survey_terms.php');
    die();
}

$surveyservicesinfo     = class_surveyServicesInfo($ServicesId);
$row_surveyservicesinfo = $surveyservicesinfo['response'][0];
?>
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
            <div class="col-xs-12">
                <a href="#" class="thumbnail">
                <img alt="Banner" data-src="holder.js/640%x160" src="resources/banners/default.png" data-holder-rendered="true" style="width: 100%; display: block;">
                </a>
            </div>
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
    'TermsId' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'TermsId', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    'Previous' => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_services.php'),
    'Next'     => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => '',
    'action'  => '',
    'method'  => 'post',
    'enctype' => null,
);

class_formGenerator2($formParams, $formFields, $formButtons);

require_once 'footer.php';?>