<?php
session_start();
$_SESSION['username']='Abhishek';
$_SESSION['password']='123456';
echo $_SESSION['username'];
echo $_SESSION['password'];


?>