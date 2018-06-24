<?php
        $row_questions = null;
        if ($formArray) {
            $i2 = 0;
            foreach ($formArray['questions'] as $row_array) {

                $row_questions = $row_array['question'];

                if ($formArray['answers']) {

                    $results .= $row_questions['Question'];
                    $results .= '<h5>' . $row_questions['Description'] . '</h5>';
                    $array_answer   = array();
                    foreach ($formArray['answers'] as $row_answers) {

                    //checked
                    $sessionid = session_id();
                    $surveyresultsinfo = class_surveyResultsInfo($sessionid, $row_questions['Id']);
                    $row_surveyresultsinfo = $surveyresultsinfo['response'][0];
                    
                        $results .= '<td align="center">';
                        if ($row_array['answer']) {
                            
                            foreach ($row_array['answer'] as $row_answerslist) {
                                if ($row_answers == $row_answerslist['Answer']) {

                                if($row_surveyresultsinfo['AnswerId']==$row_answerslist['Id']){
                                    $checked = $row_surveyresultsinfo['AnswerId'];
                                }else{
                                    $checked = null;
                                }

                                    //¿Cuánto tiempo tiene de comprar INTACO?
                                    
                                    $array_answer[] = array('label' => $row_answerslist['Answer'], 'value' => $row_answerslist['Id'], 'selected' => $checked, 'id' => $row_questions['Id']);
                                }
                            }
                        }
                    }

                    if($row_array['inputtype']=='check_img'){
                        foreach ($array_answer as $row_arrayanswers) {

                                if($row_surveyresultsinfo['AnswerId']==$row_arrayanswers['Id']){
                                    $checked = $row_surveyresultsinfo['AnswerId'];
                                }else{
                                    $checked = null;
                                }

                        $results .= '<br>';
                        $results .= class_formInput($checked, 'checkbox2', 'AnswerId2_'.$i2.'[]', $row_arrayanswers['label'], $row_arrayanswers['value'], null);
                        }
                    }elseif($row_array['inputtype']=='checkbox'){
                        foreach ($array_answer as $row_arrayanswers) {

                                if($row_surveyresultsinfo['AnswerId']==$row_arrayanswers['Id']){
                                    $checked = $row_surveyresultsinfo['AnswerId'];
                                }else{
                                    $checked = null;
                                }
                        $results .= '<br>';
                        $results .= class_formInput($checked, 'checkbox2', 'AnswerId2_'.$i2.'[]', $row_arrayanswers['label'], $row_arrayanswers['value'], null);
                        }
                    }elseif($row_array['inputtype']=='radio_img'){
                        foreach ($array_answer as $row_arrayanswers) {

                                if($row_surveyresultsinfo['AnswerId']==$row_arrayanswers['Id']){
                                    $checked = $row_surveyresultsinfo['AnswerId'];
                                }else{
                                    $checked = null;
                                }
                        $results .= '<br>';
                        $results .= class_formInput($checked, 'radio2', 'AnswerId2_'.$i2.'[]', $row_arrayanswers['label'], $row_arrayanswers['value'], null);
                        }
                    }else{
                        $results .= class_formInput(null, 'select_survey', 'AnswerId2_'.$i2.'[]', null, $array_answer, null);
                    }

                    
                } else {
                    $results .= $row_questions['Question'];
                    $results .= '<h5>' . $row_questions['Description'] . '</h5>';
                    if ($row_array['inputtype'] == 'textarea') {
                        $row_array['inputtype'] = 'textarea_big';
                    }
                    $results .= class_formInput(null, $row_array['inputtype'], 'AnswerTextarea2_'.$i2.'[]', null, null, null);
                    $results .= class_formInput(null, 'hidden', 'AnswerId2_'.$i2.'[]', null, $formParams['id'], null);
                    
                }
                $i2++;
            }
        }
?>