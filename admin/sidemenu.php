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
<?php if(isset($row_menulist['Url'])){ ?>
        <a href="<?php echo $row_menulist['Url']; ?>"><i class="fa <?php echo $row_menulist['Icon']; ?> fa-fw"></i> <?php echo $row_menulist['Name']; ?></a>
<?php }else{ ?>
        <a href="#"><i class="fa <?php echo $row_menulist['Icon']; ?> fa-fw"></i> <?php echo $row_menulist['Name']; ?></a>
<?php } ?>
    </li>
<?php }else{?>
    <li>
        <a href="<?php echo $row_menulist['Name']; ?>"><i class="fa <?php echo $row_menulist['Icon']; ?> fa-fw"></i> <?php echo $row_menulist['Name']; ?><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <?php foreach ($submenulist['response'] as $key_submenulist => $row_submenulist) { ?>
            <li>
                <?php
                //Menu - Level 3
                $menulevel3 = class_assidesubmenulist($row_submenulist['Id'],null);
                ?>
                <?php if($menulevel3['rows']){ ?>
<?php if(isset($row_menulevel3['Url'])){?>
<a href="<?php echo $row_submenulist['Url']; ?>"><?php echo $row_submenulist['Name']; ?> <span class="fa arrow"></span></a>
<?php }else{ ?>
<a href="#"><?php echo $row_submenulist['Name']; ?> <span class="fa arrow"></span></a>
<?php } ?>
                        <ul class="nav nav-third-level">
                            <?php foreach ($menulevel3['response'] as $row_menulevel3) {?>
                            <li>
                                <?php if($row_menulevel3['Url']){?>
                                <a href="<?php echo $row_menulevel3['Url']; ?>"><?php echo $row_menulevel3['Name']; ?></a>
                                <?php }else{?>
                                <a href="#"><?php echo $row_menulevel3['Name']; ?></a>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                        <!-- /.nav-third-level -->

                <?php }else{ ?>
                <a href="<?php echo $row_submenulist['Url']; ?>"><?php echo $row_submenulist['Name']; ?></a>
                <?php } ?>
            </li>
        <?php } ?>
        </ul>
        <!-- /.nav-second-level -->
    </li>
<?php } //end if
}// endfor each ?>


</ul>