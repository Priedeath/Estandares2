<?PHP
include("datos.php");

$dts = new datos();

session_start();
$usuario = $_SESSION['usuario'];
?>
<html>
	<head>
		
		<title>Perfil</title>
<!-- 		<link rel="stylesheet" type="text/css" href="css/estilopop.css"/>
 -->		
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			</head>
	<body>
		<center>
<div id='fg_membersite_content'>
		<div class="modal fade" role="dialog" id="datos" style="display:none; cursos: default">
			
			<div clas="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data=dismiss="modal">&times;</button>
						<h4 class="modal-title">Cambiar datos</h4>
					</div>

					<div class="modal-body">
						<form id="fdatos" action="cambiardatos.php" method="POST">						
							<div class='container'>
								<input type="text" placeholder="Nombre*" name="txtnombre"  maxlength="50"/>
							</div>
							
							<div class="container">
								<input type="text" placeholder="Correo*" name="txtmail"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="text" placeholder="Edad*" name="txtedad"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="text" placeholder="Telefono*" name="txtphone"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="submit" value="Actualizar" id="actualizar"/>
							</div>
						</form>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" role="dialog" id="eliminar" style="display:none; cursos: default">
			
			<div clas="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data=dismiss="modal">&times;</button>
						<h4 class="modal-title">Eliminar Usuario</h4>
					</div>

					<div class="modal-body">
						<form id="fdatos" action="eliminar.php" method="POST">						
							<div class='container'>
								<input type="text" placeholder="Usuario*" name="txtusuario"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="submit" value="Eliminar" id="actualizar"/>
							</div>
						</form>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" role="dialog" id="datosadmin" style="display:none; cursos: default">
			
			<div clas="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data=dismiss="modal">&times;</button>
						<h4 class="modal-title">Cambiar datos</h4>
					</div>

					<div class="modal-body">
						<form id="fdatos" action="cambiardatos.php" method="POST">						
							<div class='container'>
								<input type="text" placeholder="Nombre*" name="txtnombre"  maxlength="50"/>
							</div>
							
							<div class="container">
								<input type="text" placeholder="Correo*" name="txtmail"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="text" placeholder="Edad*" name="txtedad"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="text" placeholder="Telefono*" name="txtphone"  maxlength="50"/>
							</div>


							<div class="container">
								<input type="text" placeholder="Rol*" name="txtrol"  maxlength="50"/>
							</div>


							<div class="container">
								<input type="text" placeholder="Usuario*" name="txtusuario"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="submit" value="Actualizar" id="actualizar"/>
							</div>
						</form>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>



		<div class="modal fade" role="dialog" id="cambiarpwd" style="display:none; cursos: default">
			
			<div clas="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data=dismiss="modal">&times;</button>
						<h4 class="modal-title">Cambiar Contraseña</h4>
					</div>

					<div class="modal-body">
						<form id="fdatos" action="cambiarpwd.php" method="POST">													

							<div class="container">
								<input type="text" placeholder="Nueva constrasena*" name="txtpwd"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="submit" value="Cambiar" id="actualizar"/>
							</div>
						</form>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" role="dialog" id="enviarmail" style="display:none; cursos: default">
			
			<div clas="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data=dismiss="modal">&times;</button>
						<h4 class="modal-title">Enviar Correo</h4>
					</div>

					<div class="modal-body">
						<form id="enviarmail" action="mail.php" method="POST">													

							<div class="container">
								<input type="text" placeholder="Titulo*" name="txttitulo"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="text" placeholder="Mensaje*" name="txtmail"  maxlength="150"/>
							</div>

							<div class="container">
								<input type="text" placeholder="Correo*" name="txtcorreo"  maxlength="50"/>
							</div>

							<div class="container">
								<input type="submit" value="Enviar" id="actualizar"/>
							</div>
						</form>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" role="dialog" id="tablausuarios" style="display:none; cursos: default">
			
			<div clas="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data=dismiss="modal">&times;</button>
						<h4 class="modal-title">Usuarios</h4>
					</div>

					<div class="modal-body">
						<?php $dts->MostrarUsuarios(); ?>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" role="dialog" id="agregarusuario" style="display:none; cursos: default">
			
			<div clas="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data=dismiss="modal">&times;</button>
						<h4 class="modal-title">Agregar Usuario</h4>
					</div>

					<div class="modal-body">
						<form id="fdatos" action="agregar.php" method="POST">						
							<div class='container'>
								<input type="text" placeholder="Usuario" name="txtusuario"  maxlength="50"/>
							</div>
							
							<div class='container'>
								<input type="password"  placeholder="Contraseña" name="txtpassword"  maxlength="50"/>
							</div>

							<div class='container'>
								<input type="text" placeholder="Rol" name="txtrol"  maxlength="50"/>
							</div>
							
							<div class="container">
								<input type="submit" value="Agregar" id="actualizar"/>
							</div>
						</form>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		
		<h2>Perfil</h2>
		<ul>Bienvenido <? print $_SESSION['usuario']; ?>!</ul>

		<!--<p><a href='change-pwd.php'>Cambiar datos</a></p>-->
		<!--<input type="submit" value="Cambiar Datos" id="btndatos"/>-->
		

		<?php
			$dts->MostrarDatos($usuario);

		?>
		<!-- <p><a href='access-controlled.php'>A sample 'members-only' page</a></p>
		<br><br><br> -->
		<!-- <div class="container">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#datos">Cambiar datos</button>
		</div> -->
		<!-- <button type="button" class="btn btn-default" name="cerrarsesion">Cerrar Sesion</button> -->
		<p><a href='logout.php'>Logout</a></p>
		</div>



<!--
		<script>
				var modal= document.getElementById('datos');

				var btn= document.getElementById('btndatos');

				var span= document.getElementById('cerrar');



				btn.onclick=function(){
					modal.style.display="block";
				}

				span.onclick=function(){
					modal.style.display="none";

				}

				window.onclick = function(event){
					if (event.target == modal) {
						modal.style.display="none";
					}
					
				}
			</script>
		-->
	</center>
	</body>
</html>