<?php
/* * * * *
 * FORMS GENERATOR - Create Forms fields
 * value = use variable request
 * dataType = int, str, datetime, date, time, bool
 * inputType = hiddem, text, textarea, select, checkbox, email, datetime, datepick, jumpmenu, file
 * required = true or false
 * buttonType = previuos, next, submit or back
 * position = 1 = 1cols, 2 = 2cols, 3 = 3cols / based Materialized Framework
 * * * * */

function class_formGenerator2($formParams, $formFields, $formButtons)
{
    $results = null;
    $results .= '<div class="section section-custom billinfo">';
    if ($formParams['name']) {
        $results .= '<h3>' . $formParams['name'] . '</h3>'; //section-title
        $results .= '<hr>';
    }
    $results .= '<form id="validationForm" action="' . $formParams['action'] . '" method="' . $formParams['method'] . '" enctype="' . $formParams['enctype'] . '">';
    $results .= '<div class="pmd-card pmd-z-depth">';
    $results .= '<div class="pmd-card-body">';

    $i = 0;

    foreach ($formFields as $label => $row) {
        //col position start
        $pos = $i++; //define end position for clearfix
        if ($pos == 0) {
            $results .= '<div class="group-fields clearfix row">'; //clearfix start
        }

        //start col
        if ($row['position'] == 0) {
            $results .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        }
        if ($row['position'] == 1) {
            $results .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        }
        if ($row['position'] == 2) {
            $results .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
        }
        if ($row['position'] == 3) {
            $results .= '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
        }
        if ($row['position'] == 4) {
            $results .= '<div class="col-lg-4 col-md-4 col-sm-2 col-xs-12">';
        }
        if ($row['position'] == 5) {
            $results .= '<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">';
        }
        if ($row['position'] == 6) {
            $results .= '<div class="col-xs-12">';
        }

        if ($row['position']) {

            if ($row['inputType'] == 'checkbox') {
                //label styles for checkbox input
                $results .= '<div class="checkbox pmd-default-theme">';
            } elseif ($row['inputType'] == 'image') {
                //label styles for others inputs
                $results .= '<div class="form-group pmd-textfield pmd-textfield-floating-label">';
            } elseif ($row['inputType'] == 'banner2') {
                //label styles for others inputs
                $results .= '<div class="form-group pmd-textfield pmd-textfield-floating-label">';
            } else {
                //label styles for others inputs
                $results .= '<div class="form-group pmd-textfield pmd-textfield-floating-label">';
                
                if($row['inputType'] == 'label'){
                $results .= '<label for="regular1" class="control-label"><h3>' . $label . '</h3></label>';
                }else{
                $results .= '<label for="regular1" class="control-label">' . $label . '</label>';
                }
            }

            if ($row['inputType'] == "hidden") {
                //labels for hidden inputs & position 1
                $results .= '<p class="form-control-static"><strong>test</strong></p>';
            }
        } else {
            $results .= '<div>';
            $row['inputType'] = 'hidden'; //define input hidden for all position = 0
        }

        //Prohibe array values for determinates inputs
        if (is_array($row['value']) && !$row['inputType'] == 'select') {
            echo "ERROR: FIELD: " . $row['name'] . " is ARRAY, please use only STRING";
            echo "<pre>";
            print_r($row['value']);
            exit;
        }

        if ($row['inputType'] == 'image-bkp') {
            //form image action & col
            $results .= '<div data-provides="fileinput" class="fileinput fileinput-new col-lg-3">';

            //form image show preview
            $results .= '<div data-trigger="fileinput" class="fileinput-preview thumbnail img-circle img-responsive">';

            if ($row['value']) {
                $results .= '<img src="' . PATH_PROFILEPICTURE . $row['value'] . '" alt="' . $label . '">';
            } else {
                $results .= '<img src="' . PATH_PROFILEPICTURE . CONFIG_IMAGEPROFILEDEFAULT . '" alt="">';
            }

            $results .= '</div>';

            //change input
            $row['inputType'] = 'file';

            //form image button
            $results .= '<div class="action-button">';
            $results .= '<span class="btn btn-default btn-raised btn-file ripple-effect">';
            $results .= '<span class="fileinput-new"><i class="material-icons md-light pmd-xs">add</i></span>';
            $results .= '<span class="fileinput-exists"><i class="material-icons md-light pmd-xs">mode_edit</i></span>';
            $results .= '<input type="file" name="File">';

            //call input
            $results .= class_formInput('file', $row['name'], $label, $row['value'], $row['required']);
            $results .= class_formInput('hidden', $row['name'], $label, $row['value'], $row['required']);

            $results .= '</span>';
            $results .= '<a data-dismiss="fileinput" class="btn btn-default btn-raised btn-file ripple-effect fileinput-exists" href="javascript:void(0);"><i class="material-icons md-light pmd-xs">close</i></a>';
            $results .= '</div>';

            $results .= '</div>'; //end image col
        } else {
            /* INPUTS START */
            $results .= class_formInput($row['placeholder'], $row['inputType'], $row['name'], $label, $row['value'], $row['required']);
        }
        $results .= '</div>';

        //col position end
        if ($row['position'] == 0) {
            $results .= '</div>';
            if ($pos == 0) {
                //clearfix end
                $results .= '</div>';
                $i = 0; //reset position
            }
        }
        if ($row['position'] == 1) {
            $results .= '</div>';
            if ($pos == 0) {
                //clearfix end
                $results .= '</div>';
                $i = 0; //reset position
            }
        }
        if ($row['position'] == 2) {
            $results .= '</div>';
            if ($pos == 1) {
                //clearfix end
                $results .= '</div>';
                $i = 0; //reset position
            }
        }
        if ($row['position'] == 3) {
            $results .= '</div>'; //col end
            if ($pos == 2) {
                //clearfix end
                $results .= '</div>';
                $i = 0; //reset position
            }
        }
        if ($row['position'] == 4) {
            $results .= '</div>'; //col end
            if ($pos == 3) {
                //clearfix end
                $results .= '</div>';
                $i = 0; //reset position
            }
        }
        if ($row['position'] == 5) {
            $results .= '</div>'; //col end
            if ($pos == 4) {
                //clearfix end
                $results .= '</div>';
                $i = 0; //reset position
            }
        }
    } //end foreach

    $results .= '</div>';

    //input - buttons
    $results .= '<div class="pmd-card-actions">';

    if ($formButtons) {
        $results .= '<hr>';
        $results .= '<p class="btn pull-right">';
        $results .= class_formButtons($formButtons);
        $results .= '</p>';
    }

    $results .= '</div>';

    $results .= '</div>'; //section content end
    $results .= '</form>';
    $results .= '</div>';

    //js scripts
    $results .= class_formScripts();

    echo $results;
}
