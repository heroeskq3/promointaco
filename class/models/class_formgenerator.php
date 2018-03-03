<?php
/* * * * *
 * FORMS GENERATOR - Create Forms fields
 * value = use variable request
 * dataType = int, str, datetime, date, time, bool
 * inputType = hiddem, text, textarea, select, checkbox, email, datetime, datepick, jumpmenu, file
 * required = true or false
 * buttonType = previuos, next, submit or back
 * position = 1 = 1cols, 2 = 2cols, 3 = 3cols / based Materialized Framework
 * * * * */

function class_formGenerator($formParams, $formFields, $formButtons)
{
    ?>

<!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <?php if ($formParams['name']) {?>
                <div class="panel-heading">
                    <?php echo $formParams['name']; ?>
                </div>
                <?php }?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-4">
                            <?php if ($formParams['method']) {?>
                            <form id="validationForm" role="form" action="<?php echo $formParams['action']; ?>" method="<?php echo $formParams['method']; ?>" enctype="<?php echo $formParams['enctype']; ?>">
                                <?php }?>
                                <?php foreach ($formFields as $label => $row) {?>
                                <div class="form-group">
                                    <?php if ($row['position']) {?>
                                        <?php if ($label) {?>
                                        <?php if ($row['inputType'] == 'label') {?>
                                            <h4><strong><?php echo $label; ?></strong></h4>
                                        <?php } elseif($row['inputType'] == 'checkbox') {?>
                                        <?php } else {?>
                                            <label><?php echo $label; ?></label>
                                            <?php }?>
                                        <?php }?>
                                    <?php if ($row['inputType'] == 'hidden') {?>
                                    <p class="form-control-static"><?php echo $row['value']; ?></p>
                                    <?php }?>
                                    <?php
} else {
        $row['inputType'] = 'hidden';
    }
        ?>

                                    <?php echo class_formInput($row['inputType'], $row['name'], $label, $row['value'], $row['required']); ?>
                                    <?php if (0) {?>
                                    <p class="help-block">Example block-level help text here.</p>
                                    <?php }?>

                                </div>
                                <?php }?>
                                <?php if ($formButtons) {?>
                            <p class="btn pull-left">
                                <?php echo class_formButtons($formButtons); ?>
                            </p>
                                <?php }?>
                                <?php if ($formParams['method']) {?>
                            </form>
                            <?php }?>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
<?php }?>
