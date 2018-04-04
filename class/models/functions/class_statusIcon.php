<?php function class_statusIcon($i)
{
	switch ($i) {
	    case 0:
	       	$results = '<i class="fa fa-times-circle" style="font-size:20px;color:gray;"></i>';
	        break;
	    case 1:
	       	$results = '<i class="fa fa-check-circle" style="font-size:20px;color:gray;"></i>';
	        break;
	}
return $results;
}
