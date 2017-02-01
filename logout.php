<?php
session_start();
$_SESSION['usuario']= NULL;
unset($_SESSION['usuario']);

header("Location: inicio.php");

?>