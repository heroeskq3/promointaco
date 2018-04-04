<?php function class_statusInfo($i)
{
	$results = null;
	switch ($i) {
	    case 0:
	        $results = LANG_INACTIVE;
	        break;
	    case 1:
	        $results = LANG_ACTIVE;
	        break;
	    case 2:
	        $results = LANG_PENDDING;
	        break;
	    case 3:
	        $results = LANG_CANCELED;
	        break;
	}
return $results;
}
