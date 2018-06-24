<?php
function class_tableUsersDetailsList()
{
    $array = class_usersDetailsList();

    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_FULLNAME   => $row_array['FirstName'] . ' ' . $row_array['LastName'],
                LANG_EMAIL      => $row_array['Email'],
                LANG_COUNTRY     => $row_array['Country'],
                LANG_CREATED     => $row_array['CreateDate'],
                LANG_LASTUPDATE => $row_array['LastUpdate'],
                LANG_STATUS      => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'status'      => $row_array['Status'], //use = 1 or 0
                'childs'      => null, //define array
            );
        }
    }

    return $results;
}

$table_array = class_tableUsersDetailsList();

$table_params = array(
    'name'        => LANG_LIST,
    'searchbar'   => true,
    'rowsbypage'  => 10,
    'showactions' => true,
    'showmore'    => false,
    'checkbox'    => false,
);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
print class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
