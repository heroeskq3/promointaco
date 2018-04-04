<?php
//Menu List Definition
function class_tableUsersList()
{
    $array = class_usersList();

    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row) {

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_NAME        => $row['FirstName'] . " " . $row['LastName'],
                LANG_CREATED     => $row['CreateDate'],
                LANG_LASTUPDATE => $row['LastUpdate'],
                LANG_EMAIL      => $row['Email'],
                LANG_STATUS      => class_statusInfo($row['Status']),

                //Define Index, Status, Childs
                'index'       => $row['Id'],
                'status'      => $row['Status'], //use = 1 or 0
                'childs'      => null, //define array
            );
        }
    }

    return $results;
}
