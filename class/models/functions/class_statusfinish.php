<?php function class_statusFinish($i)
{
	$results = null;
	switch ($i) {
	    case 1:
	        $results = "Finalizada";
	        break;
	    case 0:
	        $results = "Incompleta";
	        break;
	}
return $results;
}
