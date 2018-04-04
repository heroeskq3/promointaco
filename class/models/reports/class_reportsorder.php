<?php 
function class_reportsOrder($array){
	$results = null;
	if($array){
		asort($array);
		$results = $array;
	}else{
		$results = $array;
	}
	return $results;
}
?>