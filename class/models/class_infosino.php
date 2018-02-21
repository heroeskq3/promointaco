<?php function class_infoSiNo($i)
{
	$results = null;
	switch ($i) {
	    case 0:
	        $results = 'No';
	        break;
	    case 1:
	        $results = 'Si';
	        break;
	}
return $results;
}
