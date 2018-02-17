<?php function class_surveyButtons($formButtons){ ?>
<?php foreach ($formButtons as $key => $value) {?>
<?php echo class_formButtons($value['buttonType'], $value['class'], $value['name'], $value['value'], $value['action'], $key); ?>
<?php }?>
<?php }?>