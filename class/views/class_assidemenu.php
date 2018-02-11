<!-- start priv -->
<?php
//Users Info
$usersinfo     = class_usersInfo($_SESSION['UserId']);
$row_usersinfo = $usersinfo['response'][0];

//Asside Privileges List
$assideprivilegeslist = class_assidePrivilegesList($row_usersinfo['TypeId']);
$row_assideprivilegeslist = $assideprivilegeslist['response'][0];

if(!$row_assideprivilegeslist['MenuId']){
    $row_usersinfo['TypeId'] = 0;
}

//asside menu list
$assidemenulist = class_assideMenuList($row_usersinfo['TypeId']);
?>
    <?php if ($assidemenulist['rows']) {
    ?>
    <?php foreach ($assidemenulist['response'] as $row_assidemenulist) {
        ?>
    <?php
        $MenuId            = $row_assidemenulist['Id'];
        $TypeId             = $row_usersinfo['TypeId'];
        $submenuList       = class_assidesubmenuList($MenuId,$TypeId);
        $submenu_totalRows = $submenuList['rows'];
        ?>
        <li class="dropdown pmd-dropdown">
            <?php if ($submenu_totalRows) {?>
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true">
                <i class="media-left media-middle material-icons md-light"><?php echo $row_assidemenulist['Icon']; ?></i>
                    <span class="media-body"><?php echo $row_assidemenulist['Name']; ?></span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <?php } else {?>
            <a href="<?php echo $row_assidemenulist['Url']; ?>">
                <i class="media-left media-middle material-icons md-light"><?php echo $row_assidemenulist['Icon']; ?></i>
                    <span class="media-body"><?php echo $row_assidemenulist['Name']; ?></span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
            <?php }?>
            <?php if ($submenu_totalRows) {?>
            <ul class="dropdown-menu">
                <?php foreach ($submenuList['response'] as $row_submenuList) {?>
                <li>
                    <a href="<?php echo $row_submenuList['Url']; ?>">
                        <?php echo $row_submenuList['Name']; ?>
                    </a>
                </li>
                <?php }?>
            </ul>
            <?php }?>
        </li>
        <?php }?>
        </ul>
        <?php }?>
        <!-- end priv -->