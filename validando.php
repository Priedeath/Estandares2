<?php

$usuario = $_POST['txtusuario'];
$password = $_POST['txtpassword'];

	if(empty($usuario) || empty($password)){
		header("Location: inicio.php?mensaje=Ingrese datos.");
	}

	 mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
	mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

	// $result = $mysqli->query("SELECT * FROM usuarios WHERE usuario ='$usuario' AND password = '$password'");
	$result = mysql_query("SELECT * FROM usuarios WHERE usuario ='$usuario' AND password = '$password'");

	if($row = mysql_fetch_array($result)){
			if($row ['usuario'] == $usuario)
				{
					if($row['password'] == $password){
									if($row['estado'] == 'inactivo'){
										$mensaje = "Usuario inactivo";
										header ("Location: inicio.php?mensaje=".$mensaje);
										exit();										

									}else {
										$resultado = mysql_query("UPDATE usuarios SET contador=0 WHERE usuario='$usuario'");
										if($resultado){
										session_start();
										$_SESSION['usuario'] = $usuario;
										header("Location: perfil.php");
										exit();
										}
										
									}			
					}
				}
		}
		$result4=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario'");
		$row3=mysql_fetch_array($result4);
		if($row3['contador'] >= 3){
			$mensaje = "Cuenta bloqueada por exceso de intentos.";
				header("Location: inicio.php?mensaje=".$mensaje);
				exit();							
		}else {
			// $result2 = $mysql->query("UPDATE usuario SET contador=contador+1 WHERE usuario = '$usuario'");			
			$result2=mysql_query("UPDATE usuarios SET contador=contador+1 WHERE usuario = '$usuario'");
			if($result2){
				$result3=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario' ");
				$row2 = mysql_fetch_array($result3);
				$mensaje = "Usuario o contraseña invalida.";
				header("Location: inicio.php?mensaje=".$mensaje."&intento=".$row2['contador']);
				exit();
			}
		}
?>