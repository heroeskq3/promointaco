<?php
/*
$stepsParams = array(
'step_active' => $step,
'labels' => array(
array('name' => 'Availability', 'icon' => 'fa-clock-o'),
array('name' => 'Guest information', 'icon' => 'fa-user'),
array('name' => 'Confirmation', 'icon' => 'fa-check'),
)
);
 */
function class_headerSteps($params)
{
    $array_count = count($params['labels']);
    $array_perc  = round(100 / $array_count, 2);
    $perc_progress = $array_perc*$params['step_active'];
    ?>
<style type="text/css">
.f1-step {
    width: <?php echo $array_perc-1; ?>%;
    text-align: center;
}
</style>
<div class="f1-steps ">
    <div class="f1-progress">
        <div class="f1-progress-line" data-now-value="<?php echo $perc_progress; ?>" data-number-of-steps="<?php echo $array_count; ?>" style="width: <?php echo $perc_progress; ?>%;"></div>
    </div>
<?php
$i = 1;
    foreach ($params['labels'] as $row) {
        $pos = $i++;
        if ($params['step_active'] >= $pos) {
            $step_sctive = 'active';
        } else {
            $step_sctive = null;
        }
        ?>
    <div class="f1-step <?php echo $step_sctive; ?>">
        <div class="f1-step-icon"><i class="fa <?php echo $row['icon'] ?>"></i></div>
        <p><?php echo $row['name'] ?></p>
    </div>
<?php }?>
</div>
<?php }?>