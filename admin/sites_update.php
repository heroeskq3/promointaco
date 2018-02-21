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

if ($form_update) {
    class_sitesUpdate($Id, $ThemeId, $MetaTittle, $MetaDescription, $MetaKeywords, $BgColor, $BgImage, $LogoHeader, $LogoFooter, $Favicon, $Language, $Phone, $Email, $Url, $Status);
    header('Location: sites_list.php');
    die();
}

//Users DetailsInfo
$sitesinfo     = class_sitesInfo($Id);
$row_sitesinfo = $sitesinfo['response'][0];

//Theme
$array_theme   = array();
$array_theme[] = array('label' => 'Admin', 'value' => 1, 'selected' => $row_sitesinfo['ThemeId']);
$array_theme[] = array('label' => 'Landing', 'value' => 2, 'selected' => $row_sitesinfo['ThemeId']);

//Languages
$array_language   = array();
$array_language[] = array('label' => 'English', 'value' => 'en', 'selected' => $row_sitesinfo['Language']);

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_sitesinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_sitesinfo['Status']);

$formFields = array(
    'form_update'      => array('name' => 'form_update', 'label' => 'form_update', 'value' => 1, 'dataType' => 'Int', 'inputType' => 'text', 'required' => false, 'position' => 0),
    'Theme'            => array('position' => 1, 'inputType' => 'select', 'required' => true, 'name' => 'ThemeId', 'value' => $array_theme),
    'Meta Tittle'      => array('position' => 1, 'inputType' => 'text', 'required' => true, 'name' => 'MetaTittle', 'value' => $row_sitesinfo['MetaTittle']),
    'Meta Description' => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'MetaDescription', 'value' => $row_sitesinfo['MetaDescription']),
    'Meta Keywords'    => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'MetaKeywords', 'value' => $row_sitesinfo['MetaKeywords']),
    'Background-Color' => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'BgColor', 'value' => $row_sitesinfo['BgColor']),
    'Background-Image' => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'BgImage', 'value' => $row_sitesinfo['BgImage']),
    'Logo Header'      => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'LogoHeader', 'value' => $row_sitesinfo['LogoHeader']),
    'Logo Footer'      => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'LogoFooter', 'value' => $row_sitesinfo['LogoFooter']),
    'Favicon'          => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'Favicon', 'value' => $row_sitesinfo['Favicon']),
    'Language'         => array('position' => 1, 'inputType' => 'select', 'required' => true, 'name' => 'Language', 'value' => $array_language),
    'Phone'            => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Phone', 'value' => $row_sitesinfo['Phone']),
    'Email'            => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Email', 'value' => $row_sitesinfo['Email']),
    'Url'              => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Url', 'value' => $row_sitesinfo['Url']),
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
