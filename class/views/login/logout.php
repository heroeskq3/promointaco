<?php
//LOGOUT
session_start();
unset($_SESSION["UserId"]);
unset($_SESSION['debug']);
header("Location: login.php");
?>