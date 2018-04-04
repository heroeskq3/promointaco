<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $results[] = array(

                //Define custom Patern Table Alias Keys => Values
                'Nombre'    => $row_array['FirstName'] . ' ' . $row_array['LastName'],
                'ID'        => $row_array['Identification'],
                'Tel'       => $row_array['Phone'],
                'E-mail'    => $row_array['Email'],
                'Compañia'  => $row_array['Company'],
                'Puesto'    => $row_array['Position'],
                'Agente'    => $row_array['Care'],
                'Local'     => $row_array['Local'],
                'País'      => $row_array['Country'],
                'Provincia' => $row_array['State'],
                'Ciudad'    => $row_array['City'],
                'Fecha'     => $row_array['CreateDate'],
                'Estado'    => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'     => $row_array['Id'],
                'status'    => $row_array['Status'], //use = 1 or 0
                'childs'    => null, //define array
            );
        }
    }
    return $results;
}

$reportsParams = array(

    'searchbar' => true,
    'filterbar' => true,
    'filter'    => true,
    'resume'    => true,
    'order'     => true,
    'table'     => true,
    'limit'     => 10,
    'hidecols'  => '1,2,3,4,5,6',
);

//customers list
$qacustomerslist       = class_surveyCustomersList();
$array_qacustomerslist = class_tableMainList($qacustomerslist);

//generate reports
print class_reportsGenerator($array_qacustomerslist, $reportsParams, null);
