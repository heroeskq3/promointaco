<?php
if (isset($_POST['get_option'])) {
    $results = null;

    function array_recibe($url_array)
    {
        $tmp = stripslashes($url_array);
        $tmp = urldecode($tmp);
        $tmp = unserialize($tmp);

        return $tmp;
    }

    $array       = $_POST['get_array'];
    $array       = array_recibe($array);

    $array = class_arrayFilter($array, 'patern', $_POST['get_option'], '=');

    if ($array['rows']) {
        $results .= '<option value="">Select</option>';

        foreach ($array['response'] as $key_array => $row_array) {
            $results .= '<option value="' . $row_array['value'] . '" ';
            $results .= '>' . $row_array['label'] . '</option>';
        }
        echo $results;
    } else {
        echo '<option value="">No Results</option>';
    }
}