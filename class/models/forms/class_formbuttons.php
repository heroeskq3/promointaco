<?php function class_formButtons($formButtons)
{
    $results = null;
    foreach ($formButtons as $key => $value) {
        $results .= class_formButtonsType($value['buttonType'], $value['disabled'], $value['class'], $value['name'], $value['value'], $value['action'], $key);
    }
    return $results;
}
