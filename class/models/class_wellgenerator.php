<?php
function class_wellGenerator($formWell, $formParams, $formFields, $formButtons)
{
    $results = null;
    $results .= '<h3>' . $formParams['name'] . '</h3>';
    if ($formParams) {
        $results .= '<form action="' . $formParams['action'] . '" method="' . $formParams['method'] . '">';
    }
    $results .= '<div class="col-md-12">';
    if (count($formWell)) {
        foreach ($formWell as $row) {
            if ($row['position'] == 3) {
                $results .= '<div class="col-xs-12 col-sm-4">';
            }
            if ($row['class']) {
                $class = $row['class'];
            } else {
                $class = 'btn-custom well well-lg well-custom';
            }

            //submit
            if ($row['type'] == 'submit') {
                $results .= '<button type="submit" name="' . $row['name'] . '" value="' . $row['value'] . '" class="' . $class . '">';
                $results .= $row['label'];
                $results .= '</button>';
            }

            if ($row['name']) {
                $input_checked  = 'checked';
                $button_checked = 'active';
            } else {
                $input_checked  = 'checked';
                $button_checked = 'active';
            }
            if ($row['type'] == 'radio') {
                $results .= '<div class="' . $class . ' ' . $button_checked . ' ">';
                $results .= '<input class="" type="radio" name="' . $row['name'] . '" value="' . $row['value'] . '"id="' . $row['name'] . '" autocomplete="off" ' . $input_checked . '>';

                $results .= '<div class="trans">';
                $results .= '<div class="trans2">';
                $results .= $row['label'];
                $results .= '</div>';
                $results .= '</div>';

                $results .= '</div>';

            }
            $results .= '<center>';
            $results .= $row['details'];
            $results .= '</center>';
            $results .= '</div>';
        }
    } else {
        $results .= '<h4>No results</h4>';
    }
    $results .= '</div>';
    //buttons
    if ($formButtons) {
        $results .= '<span class="btn pull-right">';
        $results .= class_formButtons($formButtons);
        $results .= '</span>';
    }
    $results .= '</form>';
    echo $results;
}
