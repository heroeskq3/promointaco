<?php
/*
// define buttons for form
$formButtons = array(
    'Submit'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Cancel' => array('buttonType' => 'cancel', 'action' => null),
    'Previous' => array('buttonType' => 'previous'),
    'Next' => array('buttonType' => 'next'),
);
*/
function class_formButtons($type, $class, $name, $value, $action, $label)
{
    if($class){
        $class = 'class="'.$class.'"';
    }else{
        $class = 'class="btn btn-primary next"';
    }
	$results = null;
    if ($type == 'submit') {
        $results = '<button type="submit" '.$class.' name="' . $name . '" value="' . $value . '">' . $label . '</button>';
    }
    if ($type == 'cancel') { //' . isset($HTTP_REFERER) . ' onclick="window.location.href=''
        $results = '<a href="' . isset($HTTP_REFERER) . '" '.$class.'>' . $label . '</a>';
    }
    if ($type == 'previuos') {
        $results = '<button type="submit" '.$class.' value="' . $label . '">' . $label . '</button>';
    }
    if ($type == 'next') {
        $results = '<button type="submit" '.$class.' value="' . $label . '">' . $label . '</button>';
    }
    echo $results;
    ?>
    <?php if ($type == 'link') { ?>
    <button <?php echo $class; ?>onclick="window.location.href='<?php echo $action; ?>'"><?php echo $label; ?></button>
    <?php } ?>
<?php } ?>
