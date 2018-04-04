<?php
/*
// define buttons for form
$formButtons = array(
'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
'Cancel' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);
 */
function class_formButtonsType($type, $disabled, $class, $name, $value, $action, $label)
{

    if ($class) {
        $class = $class;
    } else {
        $class = 'btn btn-primary';
    }

    if($disabled){
        $disabled = 'disabled';
    }else{
        $disabled = null;
    }

    if ($type == 'submit') {
        $results = '<button '.$disabled.' type="submit" class="' . $class . '" name="'.$name.'" value="'.$value.'">' . $label . '</button>';
    }
    if ($type == 'button') {
        $results = '<button '.$disabled.' type="button" class="' . $class . '">' . $label . '</button>';
    }
    if ($type == 'link') {
        $results = '<button '.$disabled.' type="button" class="' . $class . '"';
        $results .= 'onclick="window.location.href=';
        $results .= "'" . $action . "'";
        $results .= '"';
        $results .= '>' . $label . '</button>';
    }
    if ($type == 'cancel') {
        $action  = isset($HTTP_REFERER);
        $results = '<button '.$disabled.' type="submit" class="' . $class . '"';
        $results .= 'onclick="window.location.href=';
        $results .= "'" . $action . "'";
        $results .= '"';
        $results .= '>' . $label . '</button>';
    }
    if($type == 'home'){
        $action  = $_SERVER['PHP_SELF'];
        $results = '<button '.$disabled.' type="submit" class="' . $class . '"';
        $results .= 'onclick="window.location.href=';
        $results .= "'" . $action . "'";
        $results .= '"';
        $results .= '>' . $label . '</button>';
    }
    if($type == 'back'){
        $action  = $_SERVER['PHP_SELF'].'?Id='.$_GET['Id'];
        $results = '<button '.$disabled.' type="submit" class="' . $class . '"';
        $results .= 'onclick="window.location.href=';
        $results .= "'" . $action . "'";
        $results .= '"';
        $results .= '>' . $label . '</button>';
    }
    return $results;
}
