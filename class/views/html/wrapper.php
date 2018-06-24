<?php if($sectionParams['style']==1){ ?>
<div id="wrapper">
    <!-- Navigation -->

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 1000px">


        <?php
        if($sectionParams['navbar']){
            require_once(PATH_VIEWS.'/nav/navbar.php');
        }
        ?>
    
        <?php
        if($sectionParams['sidebar']){
            require_once(PATH_VIEWS.'/side/sidebar.php');
        }
        ?>
    </nav>
    <div id="page-wrapper">
        <?php if($sectionParams['tittle']){ ?>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><?php echo $sectionParams['tittle']; ?></h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <?php } ?>
<?php } ?>