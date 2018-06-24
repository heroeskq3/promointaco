<?php
function class_contentArea($section_style,$section_navbar,$section_tittle,$section_searchbar)
{
    //vars
    $array_url       = explode('/', $_SERVER['PHP_SELF']);
    $section_url     = array_pop($array_url);
    $sectioninfo     = class_menuInfoUrl($section_url);
    $row_sectioninfo = $sectioninfo['response'][0];

    //determine Partner menu
    if ($sectioninfo['rows']) {
        $menuinfo     = class_menuInfo($row_sectioninfo['MenuId']);
        $row_menuinfo = $menuinfo['response'][0];
    } else {
        $row_menuinfo = array('Name' => $section_tittle, 'Url' => isset($HTTP_REFERER));
    }

    //content area start
    $results = null;
    if ($section_style == 1) {
        $results .= '<div id="content" class="pmd-content inner-page">';
        $results .= '<div class="container-fluid full-width-container about">';
    } elseif ($section_style == 2) {
        $results .= '<div id="content" class="pmd-content inner-page">';
        $results .= '<div class="container-fluid full-width-container data-tables">';
    } else {
        $results .= '<div id="content" class="pmd-content content-area dashboard">';
        $results .= '<div class="container-fluid">';
        $results .= '<div class="row" id="card-masonry">';
    }

    //search bar
    if ($section_searchbar) {
        $results .= '<div class="pull-right table-title-top-action">';
        $results .= '<div class="pmd-textfield pull-left">';
        $results .= '<input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">';
        $results .= '</div>';
        $results .= ' < ahref = "?action=search"class  = "btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left" > Search <  / a > ';
        $results .= ' <  / div > ';
    }

    //Nav bar
    if ($section_navbar) {
        $results .= '<h1 class="section-title" id="services">';
        $results .= '<span>' . $section_tittle . '</span>';
        $results .= '</h1>';
        $results .= '<ol class="breadcrumb text-left">';
        $results .= '<li><a href="index.php">Home</a></li>';
        $results .= '<li class="active"><a href="' . $row_menuinfo['Url'] . '">' . $row_menuinfo['Name'] . '</a></li>';
        if ($sectioninfo['rows']) {
            $results .= '<li class="active"><a href="' . $row_sectioninfo['Url'] . '">' . $row_sectioninfo['Name'] . '</a></li>';
        }
        $results .= '</ol>';
    }
    echo $results;
    //content area - end
}
