<?php
//users list
if ($row_userstypeinfo['Admin']) {
    $userslist = class_usersList(null);
    $userslist = class_arrayFilter($userslist['response'], LANG_LEVEL, $row_userstypeinfo['Level'], '>=');
} else {
    $userslist = class_usersList($_SESSION['UserId']);
}

if ($userslist['rows']) {
    $table_array = array();
    foreach ($userslist['response'] as $row_userslist) {

        //find label for users type info
        $userstypeinfo     = class_usersTypeInfo($row_userslist['TypeId']);
        $row_userstypeinfo = $userstypeinfo['response'][0];

        //find label for users type info
        if ($row_userslist['UsersIndex']) {
            $usersdetailsinfo                 = class_usersDetailsInfo($row_userslist['UsersIndex']);
            $row_usersdetailsinfo             = $usersdetailsinfo['response'][0];
            $row_usersdetailsinfo['FullName'] = $row_usersdetailsinfo['FirstName'] . ' ' . $row_usersdetailsinfo['LastName'];
        } else {
            $row_usersdetailsinfo['FullName'] = null;
        }

        $table_array[] = array(
            //Define custom Patern Table Alias Keys => Values
            LANG_USERNAME    => $row_userslist['UserName'],
            LANG_INFO        => $row_usersdetailsinfo['FullName'],
            LANG_TYPE        => $row_userstypeinfo['Name'],
            LANG_CREATED     => $row_userslist['CreateDate'],
            LANG_LASTUPDATE => $row_userslist['LastUpdate'],
            LANG_STATUS      => class_statusInfo($row_userslist['Status']),

            //Define Index, Status, Childs
            'index'       => $row_userslist['Id'],
            'status'      => $row_userslist['Status'], //use = 1 or 0
            'childs'      => null, //define array
        );
    }
}
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
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
