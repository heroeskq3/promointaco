<?php
function class_resportsResume($array)
{
    $results = null;

    $resume = null;
    if (isset($_GET['resume'])) {
        $resume = $_GET['resume'];
    }

    if ($resume) {
        $array_count = array();
        foreach ($array as $key => $row) {
            $array_count[] = htmlspecialchars($row[$resume]);
        }

        $array_count = array_count_values($array_count);

        $array_resume = array();
        foreach ($array_count as $key => $row) {
            $row_percentage = round(($row / count($array)) * 100, 2);
            $array_resume[] = array('Descripción' => $key, 'Cantidad' => $row, 'Porcentaje' => $row_percentage . '%');
        }

        $results = $array_resume;
    } else {
        $results = $array;
    }
    return $results;
}
