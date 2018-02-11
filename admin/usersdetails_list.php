<?php
//Section Parameters
$section_tittle      = "Users Details";
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
//Update users details item
if ($action == "add") {
    header('Location: usersdetails_add.php');
    die();
}

//Update users details item
if ($action == "update") {
    header('Location: usersdetails_update.php?Id=' . $Id);
    die();
}

//Delete users details item
if ($action == "delete") {
    class_usersDetailsDelete($Id);
    header('Location: usersdetails_list.php');
    die();
}

function class_tableUsersDetailsList()
{
    $array = class_usersDetailsList();

    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Full Name'   => $row_array['FirstName'] . ' ' . $row_array['LastName'],
                'E-Mail'      => $row_array['Email'],
                'Country'     => $row_array['Country'],
                'Created'     => $row_array['CreateDate'],
                'Last Update' => $row_array['LastUpdate'],
                'Status'      => class_statusInfo($row_array['Status']),

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
    'name'        => "List",
    'searchbar'   => true,
    'rowsbypage'  => 10,
    'showactions' => true,
    'showmore'    => false,
    'checkbox'    => false,
);

//generate table list
echo class_tableGenerator($table_array, $table_params);
?>
<?php require_once 'footer.php';
