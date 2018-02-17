<?php
//Section Parameters
$section_tittle      = "Survey";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$step                = 6	;
?>
    <?php require_once 'header.php';?>
<?php 
if ($button == 'home') {
	$_SESSION = array();
    header('Location: index.php');
    die();
}
 ?>
 <form action="" method="post">
    <fieldset>
        <h4>Very thanks</h4>
        <div class="f1-buttons">
        <?php
        //buttons
        $formButtons = array(
            'Home' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' =>'button', 'value' =>'home', 'action' => 'index.php'),
        );
        class_surveyButtons($formButtons);
        ?>
        </div>
    </fieldset>
</form>
    <?php require_once 'footer.php';?>