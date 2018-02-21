<?php
function class_survey($Id)
{
    $results         = null;
    $array_questions = array();
    $array_answers   = array();

    if ($Id) {
        $i = 1;

        //questions list - start
        $surveyquestionslist = class_surveyQuestionsList($Id);
        foreach ($surveyquestionslist['response'] as $row_surveyquestionslist) {

            //survey info
            $surveyinfo = class_surveyInfo($row_surveyquestionslist['SurveyId']);
            $row_surveyinfo = $surveyinfo['response'][0];

            //answers list - start
            $surveyanswerslist = class_surveyAnswersList($row_surveyquestionslist['Id']);

            //steps
            $step_num = $i++;
            $step_next = $step_num+1;
            if($row_surveyinfo['Rows']==$step_next){
                $step_next = $step_num;
            }
            //form questions and answers array
            $array_questions[] = array('nextstep' => $step_next, 'question' => $row_surveyquestionslist, 'answer' => $surveyanswerslist['response']);

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