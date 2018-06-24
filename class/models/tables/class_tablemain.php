<?php
function class_tableMain($array, $table_params)
{

    $results = null;
    $results .= '<section class="row component-section">';
    $results .= '<div class="col-md-9">';
    $results .= '<div class="component-box">';
    $results .= '<div  class="pmd-card pmd-z-depth pmd-card-custom-view">';
    $results .= '<div class="table-responsive">';

    //table start
    $results .= '<table id="example-checkbox" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">';
    $results .= '<thead>';
    $results .= '<tr>';

    //checkbox
    $results .= '<th></th>';

    //keys
    $array_key = array_keys(current($array));
    foreach ($array_key as $key) {
        if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
            $results .= '<th>' . $key . '</th>';
        }
    }

    //actions
    $results .= '<th>Actions</th>';

    $results .= '</tr>';
    $results .= '</thead>';
    $results .= '<tbody>';
    foreach ($array as $row) {

        $results .= '<tr>';

        //checkbox
        $results .= '<th></th>';

        //values
        foreach ($array_key as $key) {
            if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                $results .= '<td data-title="' . null . '">' . $row[$key] . '</td>';
            }
        }

        //actions
        $results .= '<td class="pmd-table-row-action">';
        
        if ($table_params['showactions']) {
            $results .= '<a href="?action=update&Id=' . $row['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="material-icons md-dark pmd-sm">edit</i></a>';
        }
        if (count($row['childs'])) {
            $results .= '<a href="javascript:void();" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm child-table-expand direct-expand direct-expand-' . $row['index'] . '"><i class="material-icons md-dark pmd-sm"></i></a>';
        } else {
            if ($table_params['showactions']) {
                $results .= '<a href="?action=delete&Id=' . $row['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="material-icons md-dark pmd-sm">delete</i></a>';
            }
        }
        $results .= '</td>';
        //end actions
        $results .= '</tr>';

        //childs
        if (count($row['childs'])) {

            $results .= '<tr class="child-table">';
            $results .= '<td colspan="12">';
            $results .= '<div class="direct-child-table-' . $row['index'] . '" style="display:none">';
            $results .= class_tableChilds($row['childs']);
            $results .= '</div>';
            $results .= '</td>';
            foreach ($array_key as $key) {
                $results .= '<td></td>';
            }
            $results .= '</tr>';
        }
    }
    $results .= '</tbody>';
    $results .= '</table>';
    //table end

    $results .= '</div>';
    $results .= '</div>';
    $results .= '</div>';
    $results .= '</div>';
    $results .= '</section>';

    return $results;

}
