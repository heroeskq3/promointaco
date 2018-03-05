<?php
//Section Parameters
$section_tittle      = "Register";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 4;

require_once 'includes/config.php';
require_once 'includes/globals.php';

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
