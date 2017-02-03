<?php
session_start();

$usuario = $_SESSION['usuario'];

mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

$resul=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario'");
$row = mysql_fetch_array($result);


$mail = $_POST['txtmail'];

$titulo= $_POST['txttitulo'];
$correo = $_POST['txtcorreo'];

$headers = "MIME-VERSION: 1.0\r\n";
$headers .= "Content-type: text/html; \r\n charset=iso-8859-1\r\n";
$headers .= "From: ".$row['usuario']."<".$row['correo']."> \r\n";
$bool=mail($correo,$titulo, $mail,$headers);
if($bool){
	header("Location: pefil.php?mensaje=Mensaje enviado.");
}else {
	header("location: perfil.php?mensaje=Mensaje no enviado");
}



?>