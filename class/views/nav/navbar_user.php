<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="profile_update.php"><i class="fa fa-user fa-fw"></i> <?php echo $row_usersinfo['UserName'];?></a>
        </li>
        <li><a href="site_config.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->