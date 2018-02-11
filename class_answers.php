<?php
function class_answers()
{
    $questionslist = class_questions(14);

    $results = '<div class="table-responsive">';
    $results .= '<table class="table table-hover table-sm " width="100%">';
    $results .= '<thead class="thead-light">';
    $results .= '<tr>';
    $results .= '<th></th>';
    foreach ($questionslist['answers'] as $row_answers) {
        $results .= '<th scope="col" align="center">'.$row_answers.'</th>';
    }
    $results .= '</tr>';
    $results .= '</thead>';
    $results .= '<tbody>';
    $row_questions = null;

    foreach ($questionslist['questions'] as $row_array) {

        $row_questions = $row_array['question'];

        $results .= '<tr>';
        $results .= '<td scope="row">'.$row_questions['Question'].'</td>';
        foreach ($questionslist['answers'] as $row_answers) {
            $results .= '<td align="center">';

            if ($row_array['answer']) {
                foreach ($row_array['answer'] as $row_answerslist) {
                    if ($row_answers == $row_answerslist['Answer']) {
                        $results .= class_formInput('radio', 'Answer_'.$row_answerslist['QuestionId'], null, $row_answerslist['Points'], 'required');
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

    echo $results;
}
