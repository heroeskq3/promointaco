<?php
//Section Parameters
$section_tittle      = "Menu Manager";
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
$table_params = array(
    'name'        => "Icon List",
    'searchbar'   => true,
    'rowsbypage'  => 10,
    'showactions' => false,
    'showmore'    => false,
    'checkbox'    => false,
);

//users list
$iconslist = class_iconsList();

if ($iconslist['rows']) {
    $table_array = array();
    foreach ($iconslist['response'] as $row_iconslist) {

        $table_array[] = array(
            //Define custom Patern Table Alias Keys => Values
            'Name'   => $row_iconslist,
            'Icon'   => '<i class="fa ' . $row_iconslist . ' fa-fw" style="font-size:19px;"></i>',

            //Define Index, Status, Childs
            'index'  => null,
            'status' => null, //use = 1 or 0
            'childs' => null, //define array
        );
    }
}

//generate table list
echo class_tableGenerator($table_array, $table_params);
?>
<?php require_once 'footer.php';
