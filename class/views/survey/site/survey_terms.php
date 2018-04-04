<?php
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

//baneners
$surveysbanners = class_surveyBannersList();
if ($surveysbanners['rows']) {
    $surveysbanners        = class_arrayFilter($surveysbanners['response'], 'Status', 1, '=');
    $surveysbanners        = class_arrayFilter($surveysbanners['response'], 'ServicesId', $ServicesId, '=');
    $surveysbanners_top    = class_arrayFilter($surveysbanners['response'], 'Position', 'top', '=');
    $surveysbanners_bottom = class_arrayFilter($surveysbanners['response'], 'Position', 'bottom', '=');
}
//banner top
$array_bannerstop = array();
if ($surveysbanners_top['rows']) {
    foreach ($surveysbanners_top['response'] as $key_surveysbanners => $row_surveysbanners) {
        $array_bannerstop[] = array('label' => $row_surveysbanners['Name'], 'description' => $row_surveysbanners['Description'], 'file' => $row_surveysbanners['Image'], 'target' => $row_surveysbanners['Target'], 'url' => $row_surveysbanners['Url']);
    }
}

//banner bottom
$array_bannersbottom = array();
if ($surveysbanners_bottom['rows']) {
    foreach ($surveysbanners_bottom['response'] as $key_surveysbanners => $row_surveysbanners) {
        $array_bannersbottom[] = array('label' => $row_surveysbanners['Name'], 'description' => $row_surveysbanners['Description'], 'file' => $row_surveysbanners['Image'], 'target' => $row_surveysbanners['Target'], 'url' => $row_surveysbanners['Url']);
    }
}

$formFields = array(
    'Banner_Top'    => array('placeholder' => null, 'inputType' => 'banner', 'required' => false, 'position' => 1, 'name' => 'BannerTop', 'value' => $array_bannerstop),
    null            => array('placeholder' => null, 'inputType' => 'html', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_surveyservicesinfo['Details']),
    'Banner_Bottom' => array('placeholder' => null, 'inputType' => 'banner', 'required' => false, 'position' => 1, 'name' => 'BannerBottom', 'value' => $array_bannersbottom),

);

// define buttons for form
$formButtons = null;

//set params for form
$formParams = array(
    'name'    => LANG_SURVEYOF . ' ' . $row_surveyservicesinfo['Name'],
    'action'  => '',
    'method'  => 'post',
    'enctype' => null,
);

class_formGenerator2($formParams, $formFields, $formButtons);

//terms
if ($row_surveyservicesinfo['Terms']) {
    $modalsParams = array(
        'label'  => LANG_SHOWTERMS,
        'tittle' => LANG_TERMSANDCONDITIONS,
        'style'  => null,
        'body'   => $row_surveyservicesinfo['Terms'],
    );

    $modalsButtons = array(
        LANG_CLOSE => array('label' => LANG_CLOSE, 'type' => 'close', 'action' => null),
    );
    class_modals($modalsParams, $modalsButtons);
}

$formFields = array(
    'TermsId' => array('placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'TermsId', 'value' => 1),
);
// define buttons for form
$formButtons = array(
    LANG_BTNPREVIOUS => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_services.php'),
    LANG_BTNNEXT     => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);
//set params for form
$formParams = array(
    'name'    => '',
    'action'  => '',
    'method'  => 'post',
    'enctype' => null,
);
class_formGenerator2($formParams, $formFields, $formButtons);
