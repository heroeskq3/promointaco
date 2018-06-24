<?php function class_statusPeriod($i)
{
	$results = null;
	switch ($i) {
	    case 0:
	        $results = 'Baja Prioridad';
	        break;
	    case 1:
	        $results = $i.' Día';
	        break;
	    case ($i > 1 && $i < 30 ):
	        $results = $i.' Días';
	        break;
	    case ($i > 30 && $i < 60 ):
	        $results = '1 Mes y '.($i-30).' días';
	        break;
	    case ($i > 30 && $i < 360 ):
	        $results = round($i/30,0).' Meses';
	        break;
	    case 30:
	    case 31:
	        $results = 'Cada Mes';
	        break;
	}
return $results;
}
