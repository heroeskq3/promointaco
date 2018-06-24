<?php
function class_formInput($placeholder, $inputType, $name, $label, $value, $required)
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

    //button submit
    if ($inputType == 'submit') {
        $results .= '<input type="submit" class="btn btn-primary" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }
    //button resest
    if ($inputType == 'reset') {
        $results .= '<input type="reset" class="btn btn-primary" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    //TEXT AREA INPUT
    if ($inputType == 'textarea') {
        $results .= '<textarea class="form-control" name="' . $name . '" ' . $required . '>' . $value . '</textarea>';
    }

    //TEXT AREA INPUT
    if ($inputType == 'textarea_bbcode') {
        $results .= '<textarea class="form-control bbcode" name="' . $name . '" ' . $required . '>' . $value . '</textarea>';

    }

    //TEXT AREA INPUT - bigsize
    if ($inputType == 'textarea_big') {
        $results .= '<textarea class="form-control" style="min-height: 150px" name="' . $name . '" ' . $required . '>' . $value . '</textarea>';
    }

    //SELECT INPUT - COUNTRY
    if ($inputType == 'country') {

        $results .= '<div class="dropup">';
        $results .= '<button class="btn-custom dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        if (ZONES_NAME) {
            $results .= ' ' . ZONES_NAME . ' ';
        } else {
            $results .= LANG_FORMSELECT;
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
    //WELL INPUT - COUNTRY
    if ($inputType == 'country_well') {
        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<div class="col-md-2">';
                $results .= '<h4>' . $row_option['label'] . '</h4>';
                $results .= '<a href="?Id=' . $row_option['value'] . '"><img src="' . PATH_RESOURCES . 'flags/' . $row_option['image'] . '"></a>';
                $results .= '</div>';
            }
        }
    }

    //SELECT INPUT
    if ($inputType == 'select') {
        // TODO:
        // se debe optimizar el uso de scripts dentro de los input
        // se considera que deben ir en el formgenerator dentro de una libreria scripts
        // la liebreria deberia tener la inteligencia de detectar que componentes inputs están habilitados.

        $results .= '<select class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';

        if ($placeholder) {
            $placeholder = $placeholder;
        } else {
            $placeholder = LANG_FORMSELECT;
        }

        $results .= '<option value="">' . $placeholder . '</option>';
        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<option value="';
                if ($row_option['label']) {
                    $results .= $row_option['value'];
                } else {
                    $results .= '';
                }
                $results .= '" ';
                if ($row_option['value'] == $row_option['selected']) {
                    if ($row_option['label']) {
                        $results .= 'selected';
                    } else {
                        $results .= null;
                    }

                }
                $results .= '>';
                if ($row_option['label']) {
                    $results .= $row_option['label'];
                } else {
                    $results .= 'Undefined';
                }
                $results .= '</option>';
            }
        }
        $results .= '</select>';
    }

    //SELECT MULTIPLE
    if ($inputType == 'select_multiple') {
        // TODO:
        // se debe optimizar el uso de scripts dentro de los input
        // se considera que deben ir en el formgenerator dentro de una libreria scripts
        // la liebreria deberia tener la inteligencia de detectar que componentes inputs están habilitados.

        $results .= '<select multiple class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';

        if ($placeholder) {
            $placeholder = $placeholder;
        } else {
            $placeholder = LANG_FORMSELECT;
        }

        //$results .= '<option value="">' . $placeholder . '</option>';
        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<option value="';
                if ($row_option['label']) {
                    $results .= $row_option['value'];
                } else {
                    $results .= '';
                }
                $results .= '" ';
                if ($row_option['value'] == $row_option['selected']) {
                    if ($row_option['label']) {
                        $results .= 'selected';
                    } else {
                        $results .= null;
                    }

                }
                $results .= '>';
                if ($row_option['label']) {
                    $results .= $row_option['label'];
                } else {
                    $results .= 'Undefined';
                }
                $results .= '</option>';
            }
        }
        $results .= '</select>';
    }
    //SELECT INPUT
    if ($inputType == 'select_survey') {
        // TODO:
        // se debe optimizar el uso de scripts dentro de los input
        // se considera que deben ir en el formgenerator dentro de una libreria scripts
        // la liebreria deberia tener la inteligencia de detectar que componentes inputs están habilitados.

        $results .= '<select class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';

        if ($placeholder) {
            $placeholder = $placeholder;
        } else {
            $placeholder = LANG_FORMSELECT;
        }

        $results .= '<option value="">' . $placeholder . '</option>';
        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<option value="';
                if ($row_option['label']) {
                    $results .= $row_option['value'];
                } else {
                    $results .= '';
                }
                $results .= '" ';
                if ($row_option['value'] == $row_option['selected']) {
                    if ($row_option['label']) {
                        $results .= 'selected';
                    } else {
                        $results .= null;
                    }

                }
                $results .= '>';
                if ($row_option['label']) {
                    $results .= $row_option['label'];
                } else {
                    $results .= 'Undefined';
                }
                $results .= '</option>';
            }
        }
        $results .= '</select>';
    }

    //SELECT INPUT
    if ($inputType == 'select_simple') {
        // TODO:
        // se debe optimizar el uso de scripts dentro de los input
        // se considera que deben ir en el formgenerator dentro de una libreria scripts
        // la liebreria deberia tener la inteligencia de detectar que componentes inputs están habilitados.

        //$results .= '<select class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';
        $results .= '<select class="form-control" name="' . $name . '" ' . $required . '>';

        if ($placeholder) {
            $placeholder = $placeholder;
        } else {
            $placeholder = LANG_FORMSELECT;
        }

        $results .= '<option value="">' . $placeholder . '</option>';
        if ($value) {
            foreach ($value as $row_option) {
                $results .= '<option value="';
                if ($row_option['label']) {
                    $results .= $row_option['value'];
                } else {
                    $results .= '';
                }
                $results .= '" ';
                if ($row_option['value'] == $row_option['selected']) {
                    if ($row_option['label']) {
                        $results .= 'selected';
                    } else {
                        $results .= null;
                    }

                }
                $results .= '>';
                if ($row_option['label']) {
                    $results .= $row_option['label'];
                } else {
                    $results .= 'Undefined';
                }
                $results .= '</option>';
            }
        }
        $results .= '</select>';
    }

    //SELECT INPUT ONCHANGE PATERN
    if ($inputType == 'select_onchange1') {
        $results .= '<select onchange="fetch_select(this.value);"class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';

        if ($placeholder) {
            $placeholder = $placeholder;
        } else {
            $placeholder = LANG_FORMSELECT;
        }

        $results .= '<option value="">' . $placeholder . '</option>';

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
        $results .= '<select id="new_select" class="select-with-search form-control pmd-select2" data-show-subtext="true" data-live-search="false" name="' . $name . '" ' . $required . '>';
        if ($placeholder) {
            $placeholder = $placeholder;
        } else {
            $placeholder = LANG_FORMSELECT;
        }
        $results .= '<option value="">' . $placeholder . '</option>';
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
        <?php
        function array_envia($array)
        {
            $tmp = serialize($array);
            $tmp = urlencode($tmp);
            return $tmp;
        }

        $array = array_envia($value);
        ?>
    <script type="text/javascript">
    function fetch_select(val) {
        $.ajax({
            type: 'post',
            url: 'forms_onchange.php',
            data: {
                get_option: val,
                get_array: '<?php echo $array; ?>'
            },
            success: function(response) {
                document.getElementById("new_select").innerHTML = response;
            }
        });
    }
    </script>
    <?php
}

//start

    //SELECT INPUT ONCHANGE PATERN
    if ($inputType == 'select_onchange3') {
        $results .= '<select onchange="fetch_select4(this.value);"class="select-with-search form-control pmd-select2 selectpicker" data-show-subtext="true" data-live-search="true" name="' . $name . '" ' . $required . '>';

        if ($placeholder) {
            $placeholder = $placeholder;
        } else {
            $placeholder = LANG_FORMSELECT;
        }

        $results .= '<option value="">' . $placeholder . '</option>';

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
    if ($inputType == 'select_onchange4') {
        $results .= '<select id="new_select4" class="select-with-search form-control pmd-select2" data-show-subtext="true" data-live-search="false" name="' . $name . '" ' . $required . '>';
        if ($placeholder) {
            $placeholder = $placeholder;
        } else {
            $placeholder = LANG_FORMSELECT;
        }
        $results .= '<option value="">' . $placeholder . '</option>';
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
        <?php
        function array_envia4($array)
        {
            $tmp = serialize($array);
            $tmp = urlencode($tmp);
            return $tmp;
        }

        $array = array_envia4($value);
        ?>
    <script type="text/javascript">
    function fetch_select4(val) {
        $.ajax({
            type: 'post',
            url: 'forms_onchange.php',
            data: {
                get_option: val,
                get_array: '<?php echo $array; ?>'
            },
            success: function(response) {
                document.getElementById("new_select4").innerHTML = response;
            }
        });
    }
    </script>
    <?php
}

//end



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
    //CHECKBX INPUT
    if ($inputType == 'checkbox2') {
        if (0) {
            $checked = 'checked';
        } else {
            $checked = null;
        }

        $results .= '<label class="pmd-checkbox checkbox-pmd-ripple-effect">';
        $results .= '<input name="' . $name . '" type="checkbox" value="1" ' . $checked . '>';
        $results .= '<span> ' . $label . '</span>';
        $results .= '</label>';
    }
    //RADIO INPUT v2
    if ($inputType == 'radio2') {
        if (null) {
            $checked = 'checked';
        } else {
            $checked = null;
        }

        $results .= '<label class="pmd-checkbox checkbox-pmd-ripple-effect">';
        $results .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '>';
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
        if ($label) {
            $checked = 'checked';
        } else {
            $checked = null;
        }
        $label = $label;

        $results .= '<label class="radio_img">';
        $results .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '>';
        $results .= '<div class="btn_survey"><div>';
        $results .= '</label>';
    }
    //RADIO INPUT WITH IMAGE
    if ($inputType == 'check_img') {

        if ($label) {
            $checked = 'checked';
        } else {
            $checked = null;
        }

        $results .= '<label class="radio_img">';
        $results .= '<input type="checkbox" name="' . $name . '" value="' . $value . '" ' . $checked . '>';
        $results .= '<div class="btn_survey"><div>';
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

    //FILE INPUT
    if ($inputType == 'upload') {
        $results .= '<input type="hidden" name="upload_dir[]" value="' . $placeholder . '">';
        $results .= '<input type="hidden" name="upload_name[]" value="' . $name . '">';
        $results .= '<input type="hidden" name="upload_value[]" value="' . $value . '">';
        $results .= '<input type="file" class="form-control" name="upload_file[]" value="" ' . $required . '>';
        if ($value) {
            $results .= '<a href="' . PATH_RESOURCES . $placeholder . '/' . $value . '" target="_blank">';
            $results .= '<img class="img-thumbnail" src="' . PATH_RESOURCES . $placeholder . '/' . $value . '">';
            $results .= '<p>' . $value . ' (' . LANG_CLICKFORZOOM . ')</p>'; //label
            $results .= '</a>';
        }

    }

    //PASSWORD INPUT
    if ($inputType == 'password') {
        $results .= '<input type="password" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    //DATE PICKER INPUT
    if ($inputType == 'date') {
        $results .= '<input type="date" class="form-control" min="' . date("Y-m-d") . '" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    //DATE PICKER INPUT
    if ($inputType == 'datetime') {
        $results .= '<input type="datetime-local" class="form-control" min="' . date("Y-m-d H:i:s") . '" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    //TIME PICKER INPUT
    if ($inputType == 'time') {
        $results .= '<input type="time" class="form-control" name="' . $name . '" value="' . $value . '" ' . $required . '>';
    }

    //Image
    if ($inputType == 'image') {
        $results .= '<label>: ' . $value . '</label>';
        $results .= '<img class="col-xs-12" src="' . PATH_RESOURCES . $placeholder . '/' . $value . '" alt="">';
        $results .= '<input type="hidden" class="form-control" name="' . $name . '" value="' . $value . '">';
    }

    //banner
    if ($inputType == 'banner') {
        $results .= '<center>';
        $results .= '<div id="myCarousel" class="carousel slide" data-ride="carousel">';
        $results .= '<ol class="carousel-indicators">';
        if (count($value) > 1) {
            $i = 0;
            foreach ($value as $key => $row) {
                $pos = $i++;
                if ($pos == 0) {
                    $option_active = 'class="active"';
                } else {
                    $option_active = null;
                }
                $results .= '<li data-target="#myCarousel" data-slide-to="' . $pos . '" ' . $option_active . '></li>';
            }
        }
        $results .= '</ol>';
        $results .= '<div class="carousel-inner">';

        $i = 0;
        foreach ($value as $key => $row) {

            $pos = $i++;
            if ($pos == 0) {
                $banner_active = 'active';
            } else {
                $banner_active = null;
            }

            $results .= '<div class="item ' . $banner_active . '">';
            $results .= '<a href="' . $row['url'] . '" target="' . $row['target'] . '">';
            $results .= ''; //label
            $results .= '<img class="img-responsive" src="' . PATH_RESOURCES . 'banners/' . $row['file'] . '" alt="' . $row['description'] . '">';
            $results .= '</a>';
            $results .= '</div>';
        }

        $results .= '</div>';

        if (count($value) > 1) {
            $results .= '<a class="carousel-control left" href="#myCarousel" data-slide="prev">';
            $results .= '<span class="glyphicon glyphicon-chevron-left"></span>';
            $results .= '</a>';
            $results .= '<a class="carousel-control right" href="#myCarousel" data-slide="next">';
            $results .= '<span class="glyphicon glyphicon-chevron-right"></span>';
            $results .= '</a>';
        }

        $results .= '</div>';
        $results .= '</center>';
    }
    //banner 2 responsive
    if ($inputType == 'banner2') {
        $results .= '<center>';
        $i = 0;
        foreach ($value as $key => $row) {

            $pos = $i++;
            if ($pos == 0) {
                $banner_active = 'active';
            } else {
                $banner_active = null;
            }
            $results .= '<a href="' . $row['url'] . '" target="' . $row['target'] . '">';
            $results .= ''; //label
            $results .= '<img class="img-responsive" src="' . PATH_RESOURCES . 'banners/' . $row['file'] . '" alt="' . $row['description'] . '">';
            $results .= '</a>';
        }
        $results .= '</center>';

    }

    return $results;
}
?>