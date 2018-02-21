<?php
//Section Parameters
$section_tittle      = "Users Manager";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';
?>
<?php require_once 'header.php';?>
<?php
//Update users item
if ($action == "add") {
    header('Location: users_add.php');
    die();
}

//Update users item
if ($action == "update") {
    header('Location: users_update.php?Id=' . $Id);
    die();
}

//Delete users item
if ($action == "delete") {
    class_usersDelete($Id);
    header('Location: users_list.php');
    die();
}

//users list
$userslist = class_usersList();

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
            'Username'    => $row_userslist['UserName'],
            'Info'        => $row_usersdetailsinfo['FullName'],
            'Type'        => $row_userstypeinfo['Name'],
            'Created'     => $row_userslist['CreateDate'],
            'Last Update' => $row_userslist['LastUpdate'],
            'Status'      => class_statusInfo($row_userslist['Status']),

            //Define Index, Status, Childs
            'index'       => $row_userslist['Id'],
            'status'      => $row_userslist['Status'], //use = 1 or 0
            'childs'      => null, //define array
        );
    }
}
$table_params = array(
    'name'        => "List",
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
?>
<?php require_once 'footer.php';
