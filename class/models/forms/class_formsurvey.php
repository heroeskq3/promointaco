<?php
function class_formSurvey($FormSteps, $formParams, $formButtons, $formArray)
{
    $results = null;
    if ($formArray) {
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
        }

        //$results .= '<fieldset>';
        $results .= '<div class="table-responsive">';
        $results .= '<table class="table table-hover table-sm " width="100%">';
        $results .= '<thead class="thead-light">';
        $results .= '<tr>';
        $results .= '<td></td>';
        if ($formArray) {
            $answerslist = $formArray['answers'];
            foreach ($answerslist as $row_answers) {
                $results .= '<td scope="col" align="center">' . $row_answers . '</td>';
            }
        }

        $results .= '</tr>';
        $results .= '</thead>';
        $results .= '<tbody>';
        $row_questions = null;
        if ($formArray) {
            foreach ($formArray['questions'] as $row_array) {

                //step cut
                $row_questions = $row_array['question'];

                if ($formArray['answers']) {
                    $results .= '<tr>';
                    $results .= '<td scope="row" width="35%">';
                    $results .= $row_questions['Question'];
                    $results .= '<h5>' . $row_questions['Description'] . '</h5>';
                    $results .= '</td>';

                    //echo "<pre>";
                    //print_r($row_array);

                    foreach ($formArray['answers'] as $row_answers) {
                        $results .= '<td align="center">';
                        if ($row_array['answer']) {
                            foreach ($row_array['answer'] as $row_answerslist) {
                                if ($row_answers == $row_answerslist['Answer']) {
                                    $results .= class_formInput(null, $row_array['inputtype'], 'Answer_' . $row_answerslist['QuestionId'], null, $row_answerslist['Points'], 'required');
                                }
                            }
                        }
                        $results .= '</td>';
                    }

                    $results .= '</tr>';
                } else {
                    $results .= '<tr>';
                    $results .= '<td align="center">';
                    $results .= $row_questions['Question'];
                    $results .= '<h5>' . $row_questions['Description'] . '</h5>';
                    if ($row_array['inputtype'] == 'textarea') {
                        $row_array['inputtype'] = 'textarea_big';
                    }
                    $results .= class_formInput(null, $row_array['inputtype'], 'Answer_' . $row_questions['Id'], null, null, null);
                    $results .= '</td>';
                    $results .= '</tr>';
                }
            }
        }
        $results .= '</tbody>';
        $results .= '</table>';
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
