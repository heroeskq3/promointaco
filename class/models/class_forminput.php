<?php
function class_formInput($inputType, $name, $label, $value, $required)
{
    $results = null;

    if ($required) {
        $required = "required";
    }
    //HTML BODY
    if ($inputType == 'html') {
        $results .= '<label>' . $value . '</label>';
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
    //TEXT AREA INPUT - bigsize
    if ($inputType == 'textarea_big') {
        $results .= '<textarea class="form-control" style="min-height: 150px" name="' . $name . '" ' . $required . '>' . $value . '</textarea>';
    }


    if ($inputType == 'country4') {
    $results .= '<div class="dropdown">';
    $results .= '<a href="#pablo" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink1">';
    $results .= 'Regular';
    $results .= '</a>';
    $results .= '<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">';
    $results .= '<a class="dropdown-item" href="#">Action</a>';
    $results .= '<a class="dropdown-item" href="#">Another action</a>';
    $results .= '<a class="dropdown-item" href="#">Something else here</a>';
    $results .= '<div class="dropdown-divider"></div>';
    $results .= '<a class="dropdown-item" href="#">Separated link</a>';
    $results .= '<div class="dropdown-divider"></div>';
    $results .= '<a class="dropdown-item" href="#">One more separated link</a>';
    $results .= '</ul>';
    $results .= '</div>';
    }

    //SELECT LINKED - DROPMENU
    if ($inputType == 'country3') {
        $results .= '<ul class="nav navbar-top-links>';


        $results .= '<li class="dropdown">';

        

        $results .= '<a class="btn-custom dropdown-toggle" data-toggle="dropdown" href="#">';

        $results .= '<button class="btn-custom">';

        if (ZONES_NAME) {
            $results .= ' ' . ZONES_NAME . ' ';
        } else {
            $results .= 'Select';
        }
        
        $results .= '<i class="fa fa-globe fa-fw" style="font-size:25px;>';
        $results .= '</i>';
        
        $results .= '<i class="fa fa-caret-down">';
        $results .= '</i>';

        $results .= '</button>';

        $results .= '</a>';

        

        $results .= '<ul class="dropdown-menu dropdown-alerts">';
        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<li>';

                $results .= '<li>';
                $results .= '<a href="?Id=' . $row_option['value'] . '">';
                $results .= '<img src="' . PATH_RESOURCES . 'flags/' . $row_option['image'] . '" width="32px"> ' . $row_option['label'];
                $results .= '</a>';
                $results .= '</li>';


                $results .= '</li>';
                $results .= '<li class="divider"></li>';
            }
        }

        $results .= '</ul>';
        

    }
    //SELECT INPUT
    if ($inputType == 'country') {

        $results .= '<div class="dropup">';
        $results .= '<button class="btn-custom dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        if (ZONES_NAME) {
            $results .= ' ' . ZONES_NAME . ' ';
        } else {
            $results .= 'Select';
        }
        $results .= '<span class="caret"></span>';
        $results .= '</button>';
        $results .= '<ul class="dropdown-menu btn-custom" aria-labelledby="dropdownMenu2">';

        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<li><a href="?Id=' . $row_option['value'] . '"><img src="' . PATH_RESOURCES . 'flags/' . $row_option['image'] . '" width="32px"> ' . $row_option['label'] . '</a></li>';
                $results .= '<li role="separator" class="divider"></li>';
            }
        }
        $results .= '</div>';
    }

    if ($inputType == 'country2') {
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

    //SELECT INPUT ONCHANGE PATERN
    if ($inputType == 'select_onchange') {
        $results .= '<select onchange="fetch_select(this.value);"class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';

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

    //SELECT INPUT ONCHANGE CHILDS
    if ($inputType == 'select_onchange2') {
        $results .= '<select id="new_select" class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';
        $results .= '<option value="">Select last option</option>';
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
        ?>
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'get',
 url: 'survey_getcities.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response;
 }
 });
}
</script>
<?php
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

        $results .= '<div>';
        $results .= '<input type="radio" name="' . $name . '" value="' . $value . '">';
        $results .= '<label></label>';
        $results .= '</div>';
        $results .= '<div class="img-contenedor">';
        $results .= '</div>';

    }

    //RADIO INPUT WITH IMAGE
    if ($inputType == 'radio_img') {
        if ($value) {
            $checked = 'checked';
        } else {
            $checked = null;
        }
        $results .= '<label class="radio_img">';
        $results .= '<input type="radio" name="' . $name . '" value="' . $value . '">';
        $results .= '<img src="resources/surveys/Gold-Star.J10.2k-300x300.png">';
        $results .= '</label>';
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

    //Image
    if ($inputType == 'image') {
        $results .= '<img class="col-xs-12" src="' . PATH_RESOURCES . $name . '/' . $value . '" alt="">';
        $results .= '<input type="hidden" class="form-control" name="' . $name . '" value="' . $value . '">';
    }

    return $results;
}
?>