<?php

	$usuario = $_POST['txtusuario'];
	$pwd = $_POST['txtpassword'];
	$rol = $_POST['txtrol'];

	if(empty($usuario) || empty($pwd)){
		header("Location: perfil.php");
	}

	mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
	mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

	$result = mysql_query("INSERT INTO usuarios (idusuarios, usuario, password, rol, nombre, correo, edad, telefono) VALUES ('NULL', '$usuario','$pwd', '$rol','','','','')") or die("Error...". mysql_error());

	if ($result) {			
			header("Location: perfil.php");
		}else{
			header("Location: error.php");
			exit();
		}
		




?>
