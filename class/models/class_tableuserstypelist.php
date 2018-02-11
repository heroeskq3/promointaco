<?php
//Menu List Definition
function class_tableUsersTypeList()
{
    $array = class_usersTypeList(); //este metodo hayq ue hacerlo mejor a menos pasos

    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row) {

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Name'       => $row['Name'],
                'Admin'      => class_statusIcon($row['Admin']),
                'Status'     => class_statusInfo($row['Status']),

                //Define Index, Status, Childs
                'index'      => $row['Id'],
                'status'     => $row['Status'], //use = 1 or 0
                'childs'     => null, //define array
            );
        }
    }

    return $results;
}
