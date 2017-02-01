<?php
$usuario = $_POST['txtusuario'];
$pass = $_POST['txtpassword'];
$intento = $_POST['intento'];

	if(empty($usuario) || empty($pass)){
		header("Location: inicio.php");
	}

	mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
	mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

	$result = mysql_query("SELECT * FROM usuarios WHERE usuario ='$usuario' AND password = '$pass'");

	if ($row = mysql_fetch_array($result)) {
		if ($row['password'] == $pass ) {
			# code...
			session_start();
			$_SESSION['usuario']=$usuario;
			header("Location: perfil.php");
		}else{
			header("Location: inicio.php?intento='$intento'");
			exit();
		}
		# code...
	}else{
		header("Location: inicio.php");
		exit();
	}

?>