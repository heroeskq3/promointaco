<?php
//Section Parameters
$section_tittle      = "Customers";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';

require_once 'header.php';

//Update users details item
if ($action == "add") {
    header('Location: customers_add.php');
    die();
}

//Update users details item
if ($action == "update") {
    header('Location: customers_update.php?Id=' . $Id);
    die();
}

//Delete users details item
if ($action == "delete") {
    class_customersDelete($Id);
    header('Location: customers_list.php');
    die();
}

function class_tableMainList()
{
    $array = class_customersList();

    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Full Name'      => $row_array['FirstName'] . ' ' . $row_array['LastName'],
                'Ident' => $row_array['Identification'],
                'Phone'          => $row_array['Phone'],
                'Mobile'         => $row_array['Mobile'],
                'E-Mail'         => $row_array['Email'],
                'Company'        => $row_array['Company'],
                'Position'       => $row_array['Position'],
                'Country'        => $row_array['Country'],
                'Zone'           => $row_array['CustomInfo1'],
                'En Intaco'      => $row_array['CustomInfo2'],
                'Tipo'           => $row_array['CustomInfo3'],
                'Created'        => $row_array['CreateDate'],

                //Define Index, Status, Childs
                'index'          => $row_array['Id'],
                'status'         => $row_array['Status'], //use = 1 or 0
                'childs'         => null, //define child array
            );
        }
    }

    return $results;
}

$table_array = class_tableMainList();

$table_params = array(
    'name'        => "List",
    'searchbar'   => true,
    'maxcols'     => 5,
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

require_once 'footer.php';
