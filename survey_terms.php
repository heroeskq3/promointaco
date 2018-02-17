<?php
//Section Parameters
$section_tittle      = "Survey";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$step                = 3;
?>
<?php require_once 'header.php';?>
<?php
if ($button == 'next') {
    header('Location: survey_register.php');
    die();
}
if ($button == 'previous') {
    header('Location: survey_services.php');
    die();
}
?>
<?php
$surveyinfo     = class_surveyInfo($SurveyId);
$row_surveyinfo = $surveyinfo['response'][0];
?>
    <h4><strong><?php echo $row_surveyinfo['Name']; ?></strong></h4>
    <hr>
    <fieldset>
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
?>
<form action="" method="post">
        <div class="f1-buttons">
        <?php
        //buttons
        $formButtons = array(
            'Previous' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' =>'button', 'value' =>'previous', 'action' => 'survey_services.php'),
            'Next'     => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' =>'button', 'value' =>'next', 'action' => null),
        );
        class_surveyButtons($formButtons);
        ?>
        </div>
</form>
    </fieldset>
    <?php require_once 'footer.php';?>