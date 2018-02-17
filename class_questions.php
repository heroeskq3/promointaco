<?php
function class_questions($Id)
{
    $results         = null;
    $array_questions = array();
    $array_answers   = array();

    if ($Id) {

        //questions list - start
        $surveyquestionslist = class_surveyQuestionsList($Id);
        foreach ($surveyquestionslist['response'] as $row_surveyquestionslist) {

            //answers list - start
            $surveyanswerslist = class_surveyAnswersList($row_surveyquestionslist['Id']);

            //form questions and answers array
            $array_questions[] = array('question'=>$row_surveyquestionslist, 'answer'=>$surveyanswerslist['response']);

            if ($surveyanswerslist['rows']) {

                foreach ($surveyanswerslist['response'] as $row_surveyanswerslist) {

                    $array_answers[] .= $row_surveyanswerslist['Answer'];

                }
            }
            //answers list - end

        }
        //questions list - end

    }

    $array_answers = array_unique($array_answers);

    $results = array('questions' => $array_questions, 'answers' => $array_answers);

    return $results;

}
