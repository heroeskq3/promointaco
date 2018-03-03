<?php
ob_start();
if (!session_id()) {
    session_start();
    $SessionId = session_id();
} else {
    $SessionId = session_id();
}
require_once 'includes/config.php';
require_once 'includes/globals.php';

$ZonesId = $ZonesId;
if (isset($_SESSION['ZonesId'])) {
    $ZonesId = $_SESSION['ZonesId'];
}
$ServicesId = $ServicesId;
if (isset($_SESSION['ServicesId'])) {
    $ServicesId = $_SESSION['ServicesId'];
}

$TermsId = $TermsId;
if (isset($_SESSION['TermsId'])) {
    $TermsId = $_SESSION['TermsId'];
}
//survey zones info
$surveyzonesinfo     = class_surveyZonesInfo($ZonesId);
$row_surveyzonesinfo = $surveyzonesinfo['response'][0];
define('ZONES_NAME', $row_surveyzonesinfo['Name']);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?php echo CONFIG_METATITTLE . ' ' . ZONES_NAME . ' | ' . $section_tittle; ?>
        </title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="assets/css/flags.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo CONFIG_FAVICON; ?>" type="image/vnd.microsoft.icon" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    </head>

    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text">
                    </div>
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1 form-box">
                        <div class="f2">
                        <a href="index.php"><img src="<?php echo PATH_RESOURCES . 'logos/' . CONFIG_LOGOHEADER; ?>" alt=""></a>
                        </div>
                        <div class="f1">
<?php
if ($section_step) {
    class_headerSteps($section_step);
}
?>
<?php if (0) {?>
<h3><?php echo $section_tittle; ?></h3>
<hr>
<?php }?>

<fieldset>