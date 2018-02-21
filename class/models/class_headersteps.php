<?php function class_headerSteps($step){ ?>
<?php 
switch ($step) {
    case 1:
        $step_1 = "active";
        $step_progress = '16.5';
        break;
    case 2:
        $step_1 = "active";
        $step_2 = "active";
        $step_progress = '33';
        break;
    case 3:
        $step_1 = "active";
        $step_2 = "active";
        $step_3 = "active";
        $step_progress = '50';
        break;
    case 4:
        $step_1 = "active";
        $step_2 = "active";
        $step_3 = "active";
        $step_4 = "active";
        $step_progress = '66';
        break;
    case 5:
        $step_1 = "active";
        $step_2 = "active";
        $step_3 = "active";
        $step_4 = "active";
        $step_5 = "active";
        $step_progress = '83';
        break;
    case 6:
        $step_1 = "active";
        $step_2 = "active";
        $step_3 = "active";
        $step_4 = "active";
        $step_5 = "active";
        $step_6 = "active";
        $step_progress = '100';
        break;
}
?>
<div class="f1-steps ">
    <div class="f1-progress">
        <div class="f1-progress-line" data-now-value="<?php echo $step_progress; ?>" data-number-of-steps="6" style="width: <?php echo $step_progress; ?>%;"></div>
    </div>
    <div class="f1-step <?php echo $step_1;?>">
        <div class="f1-step-icon"><i class="fa fa-key"></i></div>
        <p>welcome</p>
    </div>
    <div class="f1-step <?php echo $step_2;?>">
        <div class="f1-step-icon"><i class="fa fa-send"></i></div>
        <p>surveys</p>
    </div>
    <div class="f1-step <?php echo $step_3;?>">
        <div class="f1-step-icon"><i class="fa fa-legal"></i></div>
        <p>terms</p>
    </div>
    <div class="f1-step <?php echo $step_4;?>">
        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
        <p>register</p>
    </div>
    <div class="f1-step <?php echo $step_5;?>">
        <div class="f1-step-icon"><i class="fa fa-question"></i></div>
        <p>questions</p>
    </div>
    <div class="f1-step <?php echo $step_6;?>">
        <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
        <p>thanks</p>
    </div>
</div>
<?php } ?>