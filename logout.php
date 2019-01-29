<?php
session_start();
unset($_SESSION['success']);
session_destroy();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'login.php';
header("Location: http://$host$uri/$extra");

?>