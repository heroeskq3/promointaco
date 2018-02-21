<?php
/*
// define buttons for form
$formButtons = array(
'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
'Cancel' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);
 */
function class_formButtonsType($type, $class, $name, $value, $action, $label)
{

    if ($class) {
        $class = $class;
    } else {
        $class = 'btn btn-primary';
    }

    if ($type == 'submit') {
        $results = '<button type="submit" class="' . $class . '" name="'.$name.'" value="'.$value.'">' . $label . '</button>';
    }
    if ($type == 'button') {
        $results = '<button type="button" class="' . $class . '">' . $label . '</button>';
    }
    if ($type == 'link') {
        $results = '<button type="submit" class="' . $class . '"';
        $results .= 'onclick="window.location.href=';
        $results .= "'" . $action . "'";
        $results .= '"';
        $results .= '>' . $label . '</button>';
    }
    if ($type == 'cancel') {
        $action  = isset($HTTP_REFERER);
        $results = '<button type="submit" class="' . $class . '"';
        $results .= 'onclick="window.location.href=';
        $results .= "'" . $action . "'";
        $results .= '"';
        $results .= '>' . $label . '</button>';
    }
    return $results;
}
