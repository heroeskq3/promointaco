<?php
function class_tableChilds($array)
{
    $results = null;
    //child table start
    if (count($array)) {
        //resturn array fields keys
        $childs_key = array_keys(current($array));
        //$results .= '<table class="table pmd-table table-striped table-sm">';
        $results .= '<table class="table pmd-table table-striped table-sm">';
        $results .= '<thead>';
        $results .= '<tr>';

        foreach ($childs_key as $key) {
            if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                $results .= '<th>' . $key . '</th>';
            }
        }

        $results .= '</tr>';
        $results .= '</thead>';
        $results .= '<tbody>';

        foreach ($array as $row) {
            //foreach child table values
            if ($row['status']) {
                $results .= '<tr>';
            } else {
                $results .= '<tr class="table-danger">'; //define color for status row
            }
            //Values for patern table
            foreach ($childs_key as $key) {
                if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                    $results .= '<td data-title="' . $row[$key] . '">' . $row[$key] . '</td>';
                }
            }
            $results .= '<td class="pmd-table-row-action">';
            $results .= '<a href="?action=update&Id=' . $row['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">edit</i></a>';
            $results .= '<a href="?action=delete&Id=' . $row['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">delete</i></a>';
            $results .= '</td></tr>';
        } //end foreach child
        $results .= '</tbody>';
        $results .= '</table>';
    } //end if child
    return $results;
}
