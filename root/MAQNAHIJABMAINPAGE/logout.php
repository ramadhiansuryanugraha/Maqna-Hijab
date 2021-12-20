<?php
session_start();

if(isset($_SESSION['id_user']))
{
    unset($_SESSION['id_user']);
}

header("Location: login-register.php");
die;

?>