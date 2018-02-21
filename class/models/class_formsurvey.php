<?php
function class_formSurvey($FormSteps, $formParams, $formButtons, $formArray)
{
    $results = null;
    if ($formParams['name']) {
        $results .= '<br>'; //section-title
        $results .= '<center>'; //section-title
        $results .= '<h3>' . $formParams['name'] . '</h3>'; //section-title
        $results .= '<h4><strong>' . $formParams['description'] . '</strong></h4>'; //section-title
        $results .= '</center>'; //section-title
        $results .= '</br>'; //section-title
    }
    if ($formParams) {
        $results .= '<form action="' . $formParams['action'] . '" method="' . $formParams['method'] . '">';
        //$results .= '<form role="form" class="f1" action="' . $formParams['action'] . '" method="' . $formParams['method'] . '">';
        $results .= '<input type="hidden" value="'.$FormSteps['step'].'" name="step">';
    }
    //$results .= '<fieldset>';
    $results .= '<div class="table-responsive">';
    $results .= '<table class="table table-hover table-sm " width="100%">';
    $results .= '<thead class="thead-light">';
    $results .= '<tr>';
    $results .= '<th></th>';
    foreach ($formArray['answers'] as $row_answers) {
        $results .= '<th scope="col" align="center">' . $row_answers . '</th>';
    }
    $results .= '</tr>';
    $results .= '</thead>';
    $results .= '<tbody>';
    $row_questions = null;

    foreach ($formArray['questions'] as $row_array) {
        //step cut
        $row_questions = $row_array['question'];

        $results .= '<tr>';
        $results .= '<td scope="row" width="35%">';
        $results .= $row_questions['Question'];
        $results .= '<h5>'.$row_questions['Description'].'</h5>';
        $results .= '</td>';
        foreach ($formArray['answers'] as $row_answers) {
            $results .= '<td align="center">';

            if ($row_array['answer']) {
                foreach ($row_array['answer'] as $row_answerslist) {
                    if ($row_answers == $row_answerslist['Answer']) {
                        
                        $results .= class_formInput('radio', 'Answer_' . $row_answerslist['QuestionId'], null, $row_answerslist['Points'], 'required');
                    }
                }
            }

            $results .= '</td>';
        }
        $results .= '</tr>';
    }
    $results .= '</tbody>';
    $results .= '</table>';
    $results .= '</div>';

    if ($formButtons) {
        $results .= '<hr>';
        $results .= class_formButtons($formButtons);
    }
    //$results .= '</fieldset>';
    if ($formParams) {
        $results .= '</form>';
    }

?>

<?php

    echo $results;
}
