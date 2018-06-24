<?php
//MYSQL - RECORDSET
function class_mysql($query, $databse, $conn, $debug)
{
    mysql_select_db($databse, $conn); //select database

    $mysql_results = mysql_query($query, $conn); //execute query

    $mysql_error = mysql_errno($conn) . mysql_error($conn);

    $mysql_determine = explode(" ", $query);

    if ($mysql_results) {
        //determine query OK

        $status = 1;

        //DETERMINE SELECT QUERY
        if ($mysql_determine[0] == "SELECT") {

            $mysql_totalRows = mysql_num_rows($mysql_results); //determine rows total

            if ($mysql_totalRows) {
                $results = array();
                while ($class_row = mysql_fetch_array($mysql_results, MYSQL_ASSOC)) {
                    array_push($results, $class_row);
                }
            } else {
                $results = null;
            }
        } else {
            $mysql_totalRows = mysql_affected_rows($conn); //determine rows total
            $results         = "Query Ok - Affected rows: " . $mysql_totalRows;
        }
    } else {
        $mysql_totalRows = 0;
        $status          = 0;
        $results         = array("msg" => "MySQL Error", "output" => $mysql_error);
    }

    $mysql_close = mysql_close($conn) or die("MySQL Error");

    //API Array Results
    
    $request  = $query;
    $response = $results;
    $rows     = $mysql_totalRows;

    $results = api($status, $request, $response, $rows, $debug);

    return $results;
}
