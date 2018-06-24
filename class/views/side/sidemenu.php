<?php
$results = null;

$results .= '<ul class="nav" id="side-menu">';
if ($sectionParams['searchbar']) {
    require_once 'searchbar.php';
}

    //determine super user
    $menulist = class_assideMenuList($row_usersinfo['TypeId']);

foreach ($menulist['response'] as $row_menulist) {

    $submenulist = class_assideSubMenuList($row_menulist['Id'], $row_usersinfo['TypeId']);
    
    //validate submenu
    if (!$submenulist['rows']) {
        $results .= '<li>';
        if (isset($row_menulist['Url'])) {
            $results .= '<a href="' . $row_menulist['Url'] . ' "><i class="fa ' . $row_menulist['Icon'] . '  fa-fw"></i> ' . $row_menulist['Name'] . ' </a>';
        } else {
            $results .= '<a href="#"><i class="fa ' . $row_menulist['Icon'] . '  fa-fw"></i> ' . $row_menulist['Name'] . ' </a>';
        }
        $results .= '</li>';
    } else {
        $results .= '<li>';
        $results .= '<a href="' . $row_menulist['Name'] . ' "><i class="fa ' . $row_menulist['Icon'] . '  fa-fw"></i> ' . $row_menulist['Name'] . ' <span class="fa arrow"></span></a>';
        $results .= '<ul class="nav nav-second-level">';


        foreach ($submenulist['response'] as $row_submenulist) {
            $results .= '<li>';
            
            //Menu - Level 3
            $menulevel3 = class_assideSubMenuList($row_submenulist['Id'], $row_usersinfo['TypeId']);
            if ($menulevel3['rows']) {
                if (isset($row_menulevel3['Url'])) {
                    $results .= '<a href="' . $row_submenulist['Url'] . '">' . $row_submenulist['Name'] . '<span class="fa arrow"></span></a>';
                } else {
                    $results .= '<a href="#">' . $row_submenulist['Name'] . '<span class="fa arrow"></span></a>';
                }
                $results .= '<ul class="nav nav-third-level">';
                foreach ($menulevel3['response'] as $row_menulevel3) {
                    $results .= '<li>';
                    if ($row_menulevel3['Url']) {
                        $results .= '<a href="' . $row_menulevel3['Url'] . '">' . $row_menulevel3['Name'] . '</a>';
                    } else {
                        $results .= '<a href="#">' . $row_menulevel3['Name'] . '</a>';
                    }
                    $results .= '</li>';
                }
                $results .= '</ul>';
            } else {
                $results .= '<a href="' . $row_submenulist['Url'] . '">' . $row_submenulist['Name'] . '</a>';
            }
            $results .= '</li>';
        }
        $results .= '</ul>';
        $results .= '</li>';
    } //end if
} // endfor each
$results .= '</ul>';

echo $results;
