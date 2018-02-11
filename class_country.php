<?php 
//Country list
function class_surveyCountry(){
    $countrylist       = class_countryList();
    $array_countrylist = array();
    foreach ($countrylist['response'] as $row_countrylist) {
        $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Prefix'], 'selected' => 'CR');
    }
    echo class_formInput('select', 'Country', 'Select your country', $array_countrylist, 'required');
}
?>