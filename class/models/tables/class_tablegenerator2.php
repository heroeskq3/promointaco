<?php
function class_tableGenerator($array, $params)
{
    //scripts
    class_tableScripts($array, $params);

    $results = null;
    $results .= '<section class="row component-section">';
    $results .= '<div class="col-md-12">';
    $results .= '<div class="component-box">';
    $results .= '<div  class="pmd-card pmd-z-depth pmd-card-custom-view">';
    
    

    //table start
    if($params['rowsbypage']){
        $results .= '<div class="table-responsive">';
        $results .= '<table id="example" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">';
    }else{
        $results .= '<div class="table-responsive pmd-card pmd-z-depth">';
        $results .= '<table class="table table-mc-red pmd-table">';
    }
    
    
    $results .= '<thead>';
    $results .= '<tr>';
    if ($params['checkbox']) {
        $results .= '<th></th>';
    }

    //keys
    $array_key = array_keys(current($array));
    foreach ($array_key as $key) {
        if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
            $results .= '<th>' . $key . '</th>';
        }
    }

    $results .= '<th>Actions</th>';
    $results .= '</tr>';
    $results .= '</thead>';
    $results .= '<tbody>';

    //values
    foreach ($array as $row_array) {
        $results .= '<tr>';
        if ($params['checkbox']) {
            $results .= '<td></td>';
        }

        //values
        foreach ($array_key as $key) {
            if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                $results .= '<td data-title="' . null . '">' . $row_array[$key] . '</td>';
            }
        }
        //actions
        $results .= '<td class="pmd-table-row-action">';
        if ($params['showactions']) {
            $results .= '<a href="?action=update&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="material-icons md-dark pmd-sm">edit</i></a>';
        }
        if (count($row_array['childs'])) {
            $results .= '<a href="javascript:void();" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm child-table-expand direct-expand direct-expand-' . $row_array['index'] . '"><i class="material-icons md-dark pmd-sm"></i></a>';
        } else {
            if ($params['showactions']) {
                $results .= '<a href="?action=delete&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="material-icons md-dark pmd-sm">delete</i></a>';
            }
        }
        $results .= '</td>';
        $results .= '</tr>';
        //end actions

        //childs
        if($row_array['childs']){
            $results .= '<tr class="child-table">';
            $results .= '<td colspan="12">';
            $results .= '<div class="direct-child-table-' . $row_array['index'] . '" style="display:none">';
            $results .= class_tableChilds($row_array['childs']);
            $results .= '</div>';
            $results .= '</td>';
            foreach ($array_key as $key) {
                $results .= '<td>';
                $results .= '</td>';
            }
            $results .= '</tr>';
        }

    } //end foreach

    $results .= '</tbody>';
    $results .= '</table>';

    $results .= '</div>';
    $results .= '</div>';
    $results .= '</div>';
    $results .= '</div>';
    $results .= '</section>';

    return $results;
}?>

