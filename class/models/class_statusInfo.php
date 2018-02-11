<?php function class_statusInfo($i)
{
	$results = null;
	switch ($i) {
	    case 0:
	        $results = 'Inactive';
	        break;
	    case 1:
	        $results = 'Active';
	        break;
	}
return $results;
}
