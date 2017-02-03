<!--
<?php
/*require_once("validar.php");
$sitiologin = new sitiologin();
	if(isset($_POST['submitted']))
	{
		if($sitiologin->login($bdConexion)){
			$sitiologin->redireccionar("perfil.php");
			
		}
	}
*/?>
-->

<?php
	session_start();
	$_SESSION['usuario'] = null;
	unset($_SESSION['usuario']);

	//codigo para recibir mensajes de valindando.php.
$mensaje = $_GET['mensaje'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
		<title>Inicio de sesion</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<!--<link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />-->
		<script type='text/javascript' src='scripts/gen_validatorv31.js'></script>

	</head>
<body>
	<center>
	<div id="fg_membersite" name="from">		
		<form id="login" action="validando.php" method="POST" accetp-charset='UTF-8'>
			<fieldset>
				<legend>Iniciar Sesion</legend>

				<input type="hidden" name="submitted" id="submitted" value='1'/>

				<div class='shot_explanation'>* Campos obligatorios</div>
				<div class='container'>
					<input type="text" placeholder="Usuario*" name="txtusuario"  maxlength="50"/>
					<span id='login_username_errorloc' class="error"></span>
				</div>

				<div class='container'>
					<input type="password" placeholder="Contraseña*" name="txtpassword"/>
					<span id="login_password_errorloc" class="error"></span>
				</div>
				<div class="container">

					<span style="color:red"><?php echo $mensaje; ?></span>
				</div>

				<div class='container'>
				<input type="submit" value="Ingresar" name="Ingresar"/>
				</div>

				
				<!-- <div class='short_explanation'><a href="resetear-pwd.php">Olvido su contraseña?</a></div> -->
			</fieldset>		
		</form>
	</div>
</center>
	<script type='text/javascript'>
		var frmvalidator = new Validator("login");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();

		frmvalidator.addValidation("txtusuario", "requerido", "Por favor ingrese su usuario");

		frmvalidator.addValidation("txtpassword", "requerido", "Por favor ingrese su contraseña");
	</script>
</body>
</html>