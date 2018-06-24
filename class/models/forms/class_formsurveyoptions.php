<?php
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
            $i = 0;
            foreach ($formArray['questions'] as $row_array) {

                //step cut
                $row_questions = $row_array['question'];

                if ($formArray['answers']) {
                    $results .= '<tr>';
                    $results .= '<td scope="row" width="35%">';
                    $results .= $row_questions['Question'];
                    $results .= '<h5>' . $row_questions['Description'] . '</h5>';
                    $results .= '</td>';

                    //question id
                    $results .= class_formInput(null, 'hidden', 'QuestionId_'.$i.'[]', null, $row_questions['Id'], null);

                    //checked
                    $sessionid = session_id();
                    $surveyresultsinfo = class_surveyResultsInfo($sessionid, $row_questions['Id']);
                    $row_surveyresultsinfo = $surveyresultsinfo['response'][0];



                    foreach ($formArray['answers'] as $row_answers) {



                        $results .= '<td align="center">';
                        if ($row_array['answer']) {
                            foreach ($row_array['answer'] as $row_answerslist) {
                    
                                if($row_surveyresultsinfo['AnswerId']==$row_answerslist['Id']){
                                    $checked = $row_surveyresultsinfo['AnswerId'];
                                }else{
                                    $checked = null;
                                }

                                if ($row_answers == $row_answerslist['Answer']) {
                                    $results .= class_formInput(null, $row_array['inputtype'], 'AnswerId_'.$i.'[]', $checked, $row_answerslist['Id'], 'required');
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


                    $results .= class_formInput(null, $row_array['inputtype'], 'AnswerTextarea_'.$i.'[]', null, null, null);
                    $results .= class_formInput(null, 'hidden', 'AnswerId_'.$i.'[]', null, $formParams['id'], null);
                    
                    $results .= '</td>';
                    $results .= '</tr>';
                }
                $i++;
            }
        }
        $results .= '</tbody>';
        $results .= '</table>';
        $results .= '</div>';
?>