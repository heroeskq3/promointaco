<?php 
function class_reportsLimit($array){

	$results = null;
	$results = array_slice($array, 0, 10);
	return $results;
}
?>