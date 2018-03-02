<?php
function class_wellGenerator($formParams, $formFields, $formButtons)
{
    $results = null;
    $results .= '<h3>' . $formParams['name'] . '</h3>';
    if ($formParams) {
        $results .= '<form action="' . $formParams['action'] . '" method="' . $formParams['method'] . '">';
    }
    if (count($formButtons)) {
        foreach ($formButtons as $row) {
            if ($row['position'] == 3) {
                $results .= '<div class="col-xs-12 col-sm-4">';
            }
            if ($row['class']) {
                $class = $row['class'];
            } else {
                $class = 'well well-lg well-custom';
            }
            if ($row['type'] == 'submit') {
                $results .= '<button type="submit" name="' . $row['name'] . '" value="' . $row['value'] . '" class="' . $class . '">';
            }
            $results .= $row['label'];
            $results .= '</button>';
            $results .= '<center>';
            $results .= $row['details'];
            $results .= '</center>';
            $results .= '</div>';
        }
    } else {
        $results .= '<h4>No results</h4>';
    }
    $results .= '</form>';
    echo $results;
}
