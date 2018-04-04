<?php function class_infoSiNo($i)
{
	$results = null;
	switch ($i) {
	    case 0:
	        $results = LANG_NO;
	        break;
	    case 1:
	        $results = LANG_YES;
	        break;
	}
return $results;
}
