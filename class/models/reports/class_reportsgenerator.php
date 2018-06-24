<?php
function class_reportsGenerator($array, $params, $filters)
{
    $results = null;

    //VIEW - Filter bar
    if ($params['filterbar']) {
        //$results_filter = class_reportsFilter($array);
    }

    //VIEW - Search bar
    if ($params['searchbar']) {
        $results_filter = class_reportsSearchBar($array);
    }

    //Array Filter
    if ($params['filter']) {
        $array = class_reportsQuery($array);
    }

    //Resume
    if ($params['resume']) {
        $array = class_resportsResume($array);
    }

    //Limit
    if ($params['limit']) {
        //$array = class_reportsLimit($array);
    }

    //Ordening
    if ($params['order']) {
        $array = class_reportsOrder($array);
    }

    //VIEW - results table
    if ($params['table']) {
        $results_table = class_reportsTable($array, $params);
    }

    $results .= '<ul class="nav nav-tabs">';
    $results .= '<li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Resumen</a></li>';

    $getcount_total = null;
    if (isset($_GET)) {
        $getcount = 1;
        foreach ($_GET as $key => $row) {
            if (($key == 'resume') || ($key == 'orderby') || ($key == 'orderform') || ($key == 'limit') || ($key == 'search') || ($key == 'action')) {
            } else {
                if ($row) {
                    $getcount_total = $getcount++;
                }
            }
        }
    }

    if ($getcount_total) {
        $results .= '<li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Filtros (' . $getcount_total . ')</a></li>';
    } else {
        $results .= '<li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Filtros</a></li>';
    }
    if (0) {
        $results .= '<li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Gráficos</a></li>';
    }
    $results .= '</ul>';

    $results .= '<div class="tab-content">';
    $results .= '<div class="tab-pane fade active in" id="home">';
    $results .= '<p>' . $results_table . '</p>';
    $results .= '</div>';
    $results .= '<div class="tab-pane fade" id="profile">';
    $results .= '<p>' . $results_filter . '</p>';
    $results .= '</div>';
    $results .= '<div class="tab-pane fade" id="messages">';
    $results .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    $results .= '</div>';
    $results .= '</div>';

    return $results;
}
