<?php
	$usuario = $_SESSION['usuario'];
	$pwd = $_POST['txtpwd'];
	session_start();
	$user =  $_SESSION['usuario'];
	if(empty($correo) || empty($name)){
		header("Location: perfil.php");
	}

	mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
	mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

	$result = mysql_query("UPDATE usuarios SET password ='$pwd' WHERE usuario = '$user'") or die("Error....".mysql_error());
	print $result;
	if ($result) {
		$result= mysql_query("SELECT usuario from usuarios where nombre = '$nombre'");
		if ($result) {
			# code...			
			header("Location: perfil.php");
		}else{
			header("Location: error.php");
			exit();
		}
		# code...
	}else{
		header("");
		exit();
	}
?>
