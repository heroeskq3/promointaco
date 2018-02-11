<ul class="nav" id="side-menu">
<?php
if ($section_searchbar) {
    require_once 'searchbar.php';
}
?>
<?php
//user info
$usersinfo = class_usersInfo($_SESSION['UserId']);
$row_usersinfo = $usersinfo['response'][0];

$userstypeinfo = class_UsersTypeInfo($row_usersinfo['TypeId']);
$row_userstypeinfo = $userstypeinfo['response'][0];

//determine super user
if($row_userstypeinfo['Admin']){
    $menulist = class_assideMenuList(null);
}else{
    $menulist = class_assideMenuList($row_usersinfo['TypeId']);
}

foreach ($menulist['response'] as $key_menulist => $row_menulist) {

//submenu list
$submenulist = class_assidesubmenulist($row_menulist['Id'],null);

//validate submenu
if(!$submenulist['rows']){
?>
    <li>
        <a href="<?php echo $row_menulist['Url']; ?>"><i class="fa <?php echo $row_menulist['Icon']; ?> fa-fw"></i> <?php echo $row_menulist['Name']; ?></a>
    </li>
<?php }else{?>
    <li>
        <a href="<?php echo $row_menulist['Name']; ?>"><i class="fa <?php echo $row_menulist['Icon']; ?> fa-fw"></i> <?php echo $row_menulist['Name']; ?><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <?php foreach ($submenulist['response'] as $key_submenulist => $row_submenulist) { ?>
            <li>
                <a href="<?php echo $row_submenulist['Url']; ?>"><?php echo $row_submenulist['Name']; ?></a>
            </li>
            <?php if(0){?>
            <li>
                <a href="#">Third Level <span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="#">Third Level Item</a>
                    </li>
                </ul>
                <!-- /.nav-third-level -->
            </li>
            <?php } ?>
        <?php } ?>
        </ul>
        <!-- /.nav-second-level -->
    </li>
<?php } //end if
}// endfor each ?>


</ul>