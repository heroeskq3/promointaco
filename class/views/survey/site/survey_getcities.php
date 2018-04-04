<?php
//$_GET['get_option'] = 12;
if (isset($_GET['get_option'])) {
    $results          = null;
    $surveystateslist = class_surveyZonesList($_GET['get_option']);
    $surveystateslist = $surveystateslist['response'];
    $surveystateslist = class_arrayFilter($surveystateslist, 'Status', '1', '=');
    $value            = $surveystateslist['response'];

    if ($surveystateslist['rows']) {
        $results .= '<option value="">Select</option>';

        foreach ($value as $row_option) {
            $results .= '<option value="' . $row_option['Name'] . '" ';

            $results .= '>' . $row_option['Name'] . '</option>';
        }
        echo $results;
    } else {
        echo '<option value="">No Results</option>';
    }
}