<?php
//Section Parameters
$section_tittle      = "Booking";
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
    header('Location: bookpackages_add.php');
    die();
}

//Update users details item
if ($action == "update") {
    header('Location: bookpackages_update.php?Id=' . $Id);
    die();
}

//Delete users details item
if ($action == "delete") {
    class_bookPackagesDelete($Id);
    header('Location: bookpackages_list.php');
    die();
}

function class_tableMainList()
{
    $array = class_bookPackagesList();

    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values

                'PackCode'    => $row_array['PackCode'],
                'Name'        => $row_array['Name'],
                'Price'       => $row_array['Price'],
                'IV'          => class_infoSiNo($row_array['IV']),
                'IS'          => class_infoSiNo($row_array['IS']),
                'VigenciaDel' => $row_array['VigenciaDel'],
                'VigenciaAl'  => $row_array['VigenciaAl'],
                'SectorId'    => $row_array['SectorId'],
                'Status'      => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'status'      => $row_array['Status'], //use = 1 or 0
                'childs'      => null, //define child array
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
    'addnew'      => 'bookpackages_add.php',
);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);

require_once 'footer.php';
