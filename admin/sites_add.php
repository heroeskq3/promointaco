<?php
//Section Parameters
$section_tittle      = "Sites";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';

require_once 'header.php';

if ($form_add) {
    class_sitesAdd($ThemeId, $MetaTittle, $MetaDescription, $MetaKeywords, $BgColor, $BgImage, $LogoHeader, $LogoFooter, $Favicon, $Language, $Phone, $Email, $Url, $Status);
    header('Location: sites_list.php');
    die();
}

//Theme
$array_theme   = array();
$array_theme[] = array('label' => 'Admin', 'value' => 1, 'selected' => $ThemeId);
$array_theme[] = array('label' => 'Landing', 'value' => 2, 'selected' => $ThemeId);

//Languages
$array_language   = array();
$array_language[] = array('label' => 'English', 'value' => 'en', 'selected' => $Language);

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

$formFields = array(
    'form_add'         => array('position' => 0, 'inputType' => 'hidden', 'required' => false, 'name' => 'form_add', 'value' => 1),
    'Theme'            => array('position' => 1, 'inputType' => 'select', 'required' => true, 'name' => 'ThemeId', 'value' => $array_theme),
    'Meta Tittle'      => array('position' => 1, 'inputType' => 'text', 'required' => true, 'name' => 'MetaTittle', 'value' => $MetaTittle),
    'Meta Description' => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'MetaDescription', 'value' => $MetaDescription),
    'Meta Keywords'    => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'MetaKeywords', 'value' => $MetaKeywords),
    'Background-Color' => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'BgColor', 'value' => $BgColor),
    'Background-Image' => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'BgImage', 'value' => $BgImage),
    'Logo Header'      => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'LogoHeader', 'value' => $LogoHeader),
    'Logo Footer'      => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'LogoFooter', 'value' => $LogoFooter),
    'Favicon'          => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'Favicon', 'value' => $Favicon),
    'Language'         => array('position' => 1, 'inputType' => 'select', 'required' => true, 'name' => 'Language', 'value' => $array_language),
    'Phone'            => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Phone', 'value' => $Phone),
    'Email'            => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Email', 'value' => $Email),
    'Url'              => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Url', 'value' => $Url),
    'Status'           => array('position' => 1, 'inputType' => 'select', 'required' => true, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'Add',
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);

require_once 'footer.php';