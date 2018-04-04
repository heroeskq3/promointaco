<?php
//for change user
session_unset(); //destroy all sessions
session_regenerate_id(); //regenerate new session id
?>
<center>
<h3><?php echo LANG_THANKS01; ?></h3>
<h4><?php echo LANG_THANKS02; ?></h4>
<br>
<p><a href="<?php echo LANG_THANKS04; ?>"><?php echo LANG_THANKS03; ?></a></p>
</center>