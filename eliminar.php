<?php

	$usuario = $_POST['txtusuario'];	

	if(empty($usuario) || empty($pwd)){
		header("Location: perfil.php");
	}
	//Cambiar datos Nombre del host= localhost usuario de conexion = root, contrase~a=
	mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());

	//estandaredb = Nombre de la base de datos.
	mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

	$result = mysql_query("DELETE FROM usuarios WHERE usuario ='$usuario'") or die("Error...". mysql_error());

	if ($result) {			
			header("Location: perfil.php");
		}else{
			header("Location: error.php");
			exit();
		}
		




?>