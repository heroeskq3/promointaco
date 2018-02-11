<?php
//Users Info
$usersinfo     = class_usersInfo($_SESSION['UserId']);
$row_usersinfo = $usersinfo['response'][0];

//Users Details Info
$usersdetailsinfo     = class_usersDetailsInfo($row_usersinfo['UsersIndex']);
$row_usersdetailsinfo = $usersdetailsinfo['response'][0];
?>
<li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
    <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
        <div class="media-left">
            <!-- Primary circle button with ripple effect -->
            <button class="btn pmd-btn-fab pmd-ripple-effect btn-primary" type="button">
                <i class="pmd-sm">
                <?php  if($row_usersdetailsinfo['Image']){?>
                    <img src="<?php echo PATH_PROFILEPICTURE. $row_usersdetailsinfo['Image']; ?>" alt="<?php echo $row_usersdetailsinfo['FirstName'].' '.$row_usersdetailsinfo['LastName']; ?>" width="60px" height="60px">
                <?php }else{ ?>
                    <img src="<?php echo PATH_PROFILEPICTURE.CONFIG_IMAGEPROFILEDEFAULT; ?>" alt="<?php echo $row_usersdetailsinfo['FirstName'].' '.$row_usersdetailsinfo['LastName']; ?>" width="60px" height="60px">
                <?php } ?>
                </i>
            </button>
        </div>
        <div class="media-body media-middle">
            
                <?php echo $row_usersdetailsinfo['FirstName'].' '.$row_usersdetailsinfo['LastName']; ?>
                <h6>(Supervisor)</h6>
        </div>
        <div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="profile_update.php">
                <?php echo LANG_PERFILEDIT; ?>
            </a>
        </li>
        <li>
            <a href="logout.php">
                <?php echo LANG_LOGOUT; ?>
            </a>
        </li>
    </ul>
</li>