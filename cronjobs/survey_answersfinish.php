<?php
ini_set('memory_limit', '2048M');

//Section Parameters
$sectionParams = array(
    'tittle'      => 'Cronjob - Finaliza resultados de respuestas para los informes',
    'description' => '',
    'homedir'     => '../',
    'restrict'    => true,
    'navbar'      => true,
    'sidebar'     => true,
    'searchbar'   => false,
    'style'       => true,
    'debug'       => false,
);
require_once 'header.php';

//script start
$surveyanswerscustomers = class_surveyAnswersCustomers();
$surveyanswersfinish    = class_surveyAnswersFinish();

echo "<pre>";
print_r($surveyanswerscustomers);
print_r($surveyanswersfinish);
//script end

require_once 'footer.php';
