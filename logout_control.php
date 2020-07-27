<?php
session_start();

session_destroy();

session_start();
$_SESSION['login_error'] = "Anda berhasil Logout";

header('location:login.php');
?>