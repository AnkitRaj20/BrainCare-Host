<?php 
session_start();
ob_start();
 session_destroy();

 header('location: http://64.227.133.196/loginForm.php');
?>