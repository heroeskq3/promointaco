<?php
function class_formInput($inputType, $name, $label, $value, $required)
{
    $results = null;

    if ($required) {
        $required = "required";
    }

    //HIDDEN INPUT
    if ($inputType == 'hidden') {
        $results .= '<input type="hidden" class="form-control" name="' . $name . '" value="' . $value . '">';
    }
    //TEXT INPUT
    if ($inputType == 'text') {
        $results .= '<input type="text" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }
    //TEXT AREA INPUT
    if ($inputType == 'textarea') {
        $results .= '<textarea class="form-control" name="' . $name . '" ' . $required . '>' . $value . '</textarea>';
    }

    //SELECT INPUT
    if ($inputType == 'country') {
        $results .= '</div>';
        $results .= '<a href="#" class="well dropdown-toggle" data-toggle="dropdown">';

        if (ZONES_NAME) {
            $results .= ' ' . ZONES_NAME;
        } else {
            $results .= 'Select';
        }

        $results .= '<b class="caret"></b>';
        $results .= '</a>';

        $results .= '<ul class="dropdown-menu">';
        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<li><a href="?Id=' . $row_option['value'] . '"><img src="' . PATH_RESOURCES . 'flags/' . $row_option['image'] . '" width="32px"> ' . $row_option['label'] . '</a></li>';
            }
        }
        $results .= '</ul>';

        $results .= '</li>';
        $results .= '</ul>';
    }

    //SELECT INPUT
    if ($inputType == 'select') {
        //$results .= '<select class="select-with-search form-control pmd-select2" data-live-search="true" name="' . $name . '" '.$required.'>';
        $results .= '<select class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';
        $results .= '<option value="">Select</option>';
        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<option value="' . $row_option['value'] . '" ';
                if ($row_option['value'] == $row_option['selected']) {
                    $results .= 'selected';
                }
                $results .= '>' . $row_option['label'] . '</option>';
            }
        }
        $results .= '</select>';
    }
    //CHECKBX INPUT
    if ($inputType == 'checkbox') {
        if ($value) {
            $checked = 'checked';
        } else {
            $checked = null;
        }

        $results .= '<label class="pmd-checkbox checkbox-pmd-ripple-effect">';
        $results .= '<input name="' . $name . '" type="checkbox" value="1" ' . $checked . '>';
        $results .= '<span> ' . $label . '</span>';
        $results .= '</label>';
    }
    //RADIO INPUT
    if ($inputType == 'radio') {
        if ($value) {
            $checked = 'checked';
        } else {
            $checked = null;
        }
        $results .= '<div class="incluir">';
        $results .= '<input type="radio" name="' . $name . '" value="' . $value . '">';
        $results .= '<label></label>';
        $results .= '</div>';

        $results .= '<div class="img-contenedor">';
        $results .= '</div>';

    }
    //PHONE NUMBER INPUT
    if ($inputType == 'tel') {
        $results .= '<input type="tel" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }
    //EMAIL INPUT
    if ($inputType == 'email') {
        $results .= '<input type="email" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }
    //FILE INPUT
    if ($inputType == 'file') {
        $results .= '<input type="file" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    //PASSWORD INPUT
    if ($inputType == 'password') {
        $results .= '<input type="password" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    //DATE PICKER INPUT
    if ($inputType == 'date') {
        $results .= '<input type="date" class="form-control" min="' . date("Y-m-d") . '" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    //TIME PICKER INPUT
    if ($inputType == 'time') {
        $results .= '<input type="time" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    return $results;
}
