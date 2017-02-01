<?php

class datos{

	public function MostrarDatos($usuario){

		$user= $usuario;
		mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
	mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());


	$result = mysql_query("SELECT * FROM usuarios WHERE usuario ='$user' ");
	

	if ($row = mysql_fetch_array($result)) {
		print '<div class="container">';
		print '<ul> Nombre: '.$row['nombre'].'</ul>';
		print '</div>';
		print '<div class="container">';
		print '<ul>Edad: '.$row['edad']. '</ul>';
		print '</div>';
		print '<div class="container">';
		print '<ul>Correo: '.$row['correo'].'</ul>';
		print '</div>';
		print '<div class="container">';
		print '<ul>Telefono: '.$row['telefono'].'</ul>';
		print '</div>';
		if($row['rol'] == '0'){			
			print '<div class="container">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#datosadmin">Cambiar datos de usuario</button>';

			print '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#tablausuarios">Ver usuarios</button>';

			print '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#agregarusuario">Agregar Usuario</button>';

			print '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#eliminar">Eliminar Usuario</button>
		</div>';
		print '';
		}

		if($row['rol'] == '1') {
			print '<div class="container">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#datos">Cambiar datos</button>
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#cambiarpwd">Cambiar Contraseña</button>
		</div>';
		}

		# code...	
	} else {
		print '<div class="container">';
		print '<ul> Datos no encontrados </ul>';
		print '</div>';
	}

	}

	public function MostrarUsuarios(){
		$user= $usuario;
		mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
	mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

		$sql = mysql_query('SELECT * FROM usuarios');


		print '<table class="table">';
		print '<tr>';
		print '<th> Usuario </th>';		
		print '<th> Nombre </th>';
		print '<th> Rol </th>';
		
		print '<th> Correo </th>';
		print '<th> Edad </th>';
		print '<th> Telefono </th>';
		print '</tr>';


		while ( $row = mysql_fetch_array($sql)) {
				print '<tr>';
				print '<td>'.$row['usuario'].'</td>';
				print '<td>'.$row['nombre'].'</td>';
				print '<td>'.$row['rol'].'</td>';
				print '<td>'.$row['correo'].'</td>';
				print '<td>'.$row['edad'].'</td>';
				print '<td>'.$row['telefono'].'</td>';
				print '</tr>';
					# code...
		}
		print '</table>';
	}

	public function ActualizarDatos($usuario){
		$name= $_POST['txtnombre'];
		$correo= $POST['txtmail'];
		$edad= $_POST['txtedad'];
		$telefono= $_POST['txtphone'];
		$user =  $usuario;
		print $user;
		if(empty($correo) || empty($name)){
			header("Location: perfil.php");
		}

		mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
		mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

		$result = mysql_query("UPDATE usuarios SET nombre='#name', correo = '$correo', edad = '$edad', telefono = '$telefono' WHERE usuario = '$user')");

		if ($row = mysql_fetch_array($result)) {
			if ($row['nombre'] == $name ) {
				# code...			
				header("Location: perfil.php");
			}else{
				header("");
				exit();
			}
			# code...
		}else{
			header("");
			exit();
		}

	}


	public function ActualizarDatosAdmin(){
		$name= $_POST['txtnombre'];
		$correo= $POST['txtmail'];
		$edad= $_POST['txtedad'];
		$telefono= $_POST['txtphone'];
		$rol = $_POST['txtrol'];
		$user = $_POST['txtusuario'];
		print $user;
		if(empty($correo) || empty($name)){
			header("Location: perfil.php");
		}

		mysql_connect('localhost', 'root', 'DaniExp2') or die("Error al conectar..." . mysql_error());
		mysql_select_db('estandaresbd') or die("Error seleccionando tabla..." . mysql_error());

		$result = mysql_query("UPDATE usuarios SET nombre='#name', correo = '$correo', edad = '$edad', telefono = '$telefono', rol ='$rol' WHERE usuario = '$user')");

		if ($row = mysql_fetch_array($result)) {
			if ($row['nombre'] == $name ) {
				# code...			
				header("Location: perfil.php");
			}else{
				header("");
				exit();
			}
			# code...
		}else{
			header("");
			exit();
		}

	}


		public function logout(){
			session_start();
			$_SESSION['usuario']= NULL;
			unset($_SESSION['usuario']);

			header("Location: inicio.php");
	}
}

?>