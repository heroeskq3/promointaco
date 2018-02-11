<?php
/*
// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'action' => null),
    'Cancel' => array('buttonType' => 'cancel', 'action' => null),
    'Previous' => array('buttonType' => 'previous'),
    'Next' => array('buttonType' => 'next'),
);
*/
function class_formButtons($type, $action, $label)
{
	$results = null;
    if ($type == 'submit') {
        $results = '<input type="submit" class="btn btn-primary next" value="' . $label . '">';
    }
    if ($type == 'cancel') {
        $results = '<a href="' . isset($HTTP_REFERER) . '" class="btn btn-default">' . $label . '</a>';
    }
    if ($type == 'previuos') {
        $results = '<input type="submit" class="btn btn-primary next" value="' . $label . '">';
    }
    if ($type == 'next') {
        $results = '<input type="submit" class="btn btn-primary next" value="' . $label . '">';
    }
    if ($type == 'link') {
        $results = '<a href="'.$action.'" class="btn btn-default">'.$label.'</a>';
    }

    return $results;
}
