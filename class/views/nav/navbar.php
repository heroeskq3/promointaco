<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">
            <img src="<?php echo PATH_RESOURCES.'/logos/'.CONFIG_LOGOHEADER3;?>" alt="">        
    </a>
</div>


<!-- /.navbar-header -->
<?php if(1){ ?>
<ul class="nav navbar-top-links navbar-right">
    <?php //require_once('navbar_messages.php') ?>
    <?php //require_once('navbar_tasks.php') ?>
    <?php //require_once('navbar_notify.php') ?>
    <?php require_once('navbar_user.php') ?>
</ul>
<?php } ?>
<!-- /.navbar-top-links -->