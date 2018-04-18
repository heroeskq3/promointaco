<?php function class_modals($modalsParams, $modalsButtons){ ?>
<?php if($modalsParams['style']){ ?>
<div class="panel panel-default">

    <?php if($modalsParams['tittle']){ ?>
    <div class="panel-heading">
        <?php echo $modalsParams['tittle'] ?>
    </div>
    <?php } ?>
        <?php } ?>
        <?php if($modalsParams['tittle']){ ?>
    <h3>
        <?php echo $modalsParams['tittle'] ?>
    </h3>
    <?php } ?>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <!-- Button trigger modal -->
        <div class="col-lg-3 col-md-12 col-sm-12">
        <button class="btn-custom btn-lg form-control" data-toggle="modal" data-target="#myModal">
            <?php echo $modalsParams['label'] ?>
        </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $modalsParams['tittle'] ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $modalsParams['body'] ?>
                    </div>
                    <div class="modal-footer">

                        <?php foreach ($modalsButtons as $row_buttons) {?>
                        <?php if($row_buttons['type']=='close'){ ?>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $row_buttons['label'];?></button>
                        <?php } ?>
                        <?php if($row_buttons['type']=='button'){ ?>
                        <button type="button" class="btn btn-primary"><?php echo $row_buttons['label'];?></button>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- .panel-body -->
    <?php if($modalsParams['style']){ ?>
</div>
<?php } ?>
<!-- /.panel -->
<?php } ?>