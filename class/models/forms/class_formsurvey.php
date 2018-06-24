<?php
function class_formSurvey($FormSteps, $formParams, $formButtons, $formArray)
{

    $results = null;
    if ($formArray) {

$results .= "
<style>
.radio_img>input+.btn_survey {
    background:  url('resources/surveys/".IMG_INPUTIMAGE."');
    background-repeat: no-repeat;
}

.radio_img>input:checked+.btn_survey {
    background:  url('resources/surveys/".IMG_INPUTHOVER."');
    background-repeat: no-repeat;
}

.radio_img>input:hover+.btn_survey {
    background:  url('resources/surveys/".IMG_INPUTHOVER."');
    background-repeat: no-repeat;
}
</style>";


if($_POST['form_add']){
    if($_POST['AnswerError']){
        $results .= '<div class="alert alert-danger">Debe seleccionar una respuesta</div>';
    }
}
if($formParams['id']){

}

        if ($formParams['name']) {
            $results .= '<br>'; //section-title
            $results .= '<center>'; //section-title
            $results .= '<h3>' . $formParams['name'] . '</h3>'; //section-title
            $results .= '<h4>' . $formParams['description'] . '</h4>'; //section-title
            $results .= '</center>'; //section-title
            $results .= '</br>'; //section-title
        }
        if ($formParams) {
            $results .= '<form action="' . $formParams['action'] . '" method="' . $formParams['method'] . '">';
            //$results .= '<form role="form" class="f1" action="' . $formParams['action'] . '" method="' . $formParams['method'] . '">';
            $results .= '<input type="hidden" value="' . $FormSteps['step'] . '" name="step">';
            
            $results .= '<input type="hidden" value="1" name="form_add">';
            $results .= '<input type="hidden" value="'.count($formArray['questions']).'" name="form_qnty">';
        }

        //question options area responsive v1
        $results .= '<div class="responsivev1">';
        require_once('class_formsurveyoptions.php');
        $results .= '</div>';

        //question options area responsive v2
        $results .= '<div class="responsivev2">';
        require_once('class_formsurveyoptions2.php');
        $results .= '</div>';


    } else {
        $results .= LANG_NORESULTS;
    }
    if ($formButtons) {
        $results .= '<hr>';
        $results .= '<p class="btn pull-right">';
        $results .= class_formButtons($formButtons);
        $results .= '</p>';
    }
    //$results .= '</fieldset>';
    if ($formParams) {
        $results .= '</form>';
    }

    ?>

<?php

    echo $results;
}
