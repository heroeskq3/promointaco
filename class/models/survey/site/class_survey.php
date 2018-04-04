<?php
function class_survey($Id)
{
    $results         = null;
    $array_questions = array();
    $array_answers   = array();
    $step_next       = null;

    if ($Id) {
        $i = 1;

        //survey info
        $surveyinfo     = class_surveyInfo($Id);
        $row_surveyinfo = $surveyinfo['response'][0];

        //steps
        /*
        $step_num  = $i++;
        $step_next = $step_num + 1;
        if ($row_surveyinfo['Rows'] == $step_next) {
        $step_next = $step_num;
        }
         */

        //questions list - start
        $surveyquestionslist = class_surveyQuestionsList($Id);

        if ($surveyquestionslist['rows']) {
            foreach ($surveyquestionslist['response'] as $row_surveyquestionslist) {

                //answers list - start
                $surveyanswerslist = class_surveyAnswersList($row_surveyquestionslist['Id']);

                //steps
                $step_num = $i++;

                if ($step_num <= $row_surveyinfo['Rows']) {
                    $step_next = $step_num + 1;
                } else {
                    $step_next = $step_num;
                }

                //form questions and answers array
                $array_questions[] = array('inputtype' => $row_surveyinfo['InputType'], 'nextstep' => $step_next, 'question' => $row_surveyquestionslist, 'answer' => $surveyanswerslist['response']);

                if ($surveyanswerslist['rows']) {

                    $surveyanswerslist = $surveyanswerslist['response'];
                    $surveyanswerslist = class_arraySort($surveyanswerslist, 'Points', SORT_DESC);

                    foreach ($surveyanswerslist as $row_surveyanswerslist) {

                        $array_answers[] .= $row_surveyanswerslist['Answer'];

                    }
                }
                //answers list - end

            }
            //questions list - end
        } else {
            $array_questions[] = array('inputtype' => $row_surveyinfo['InputType'], 'nextstep' => $step_next, 'question' => null, 'answer' => null);
        }

    }

    $array_answers = array_unique($array_answers);

    $results = array('questions' => $array_questions, 'answers' => $array_answers);

    //echo "<pre>";
    //print_r($results);

    return $results;

}
