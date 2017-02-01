<?php
include("conexion.php");

class sitiologin{

	var $usuario;
	var $pwd;
	var $database;
	var $tabename;
	var $connection;
	var $rand_key;

	var $error_message;


	public function login($bdConexion){
	$pass = $_POST["txtpassword"];	
	$usuario = $_POST["txtusuario"];
	$sql= "SELECT usuario, password FROM usuarios WHERE usuario='.$usuario.'AND password='.$pass.'";
	//$consul = mysqli_query($sql);
	$consul = $bdConexion->consultaSQL($sql);
	if($consul==0){
		return true;
	}else{
		return false;
	}

	}

	function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->obtenervarsesion();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }

        function UserFullName()
    {
        return isset($_SESSION['name_of_user'])?$_SESSION['name_of_user']:'';
    }


	function InitDB($host, $uname, $pwd, $database, $tablename){
		$this->db_host = $host;
		$this->username = $uname;
		$this->pwd = $pwd;
		$this->database = $database;
		$this->tablename = $tablename;
	}

	function SetRamdomKey($key){
		$this->rand_key = $key;
	}
	function iniciar(){
		if(empty($_POST['txtusuario'])){
			$this->ControlError('Campo usuario vacio!');
			return false;
		}
		if(empty($_POST['txtpassword'])){
			$this->ControlError('Campo contraseña vacio!');
			return false;
		}
		$username = trim($_POST['txtusuario']);
		$password = trim($_POST['txtpassword']);
		if(!isset($_SESSION)){session_start();}
		if(!$this->controllogindb($username, $password)){
			return false;
		}

		$_SESSION[$this->obtenervarsesion()] = $username;

		return true;
	}

	function obtenervarsesion(){
		$retvar = md5($this->rand_key);
		$retvar = 'usr_'.substr($retvar, 0,10);
		return $retvar;
	}

	function CheckLoginInDB($username, $password){
		if(!$this->DBLogin()){
			$this->ControlError("Conexion a base de datos fallida");
			return false;
		}

		$username = $this->SanittizeForSql($username);
		$$nresult=mysql_query("SELECT * FROM $this->tablename WHERE username = '$username'", $this->connection) or die(mysql_error());
		
	}

	function redireccionar($url){
		header("Location: $url");
		exit;
	}

	function SafeDisplay($value_name){
		if(empty($_POST[$value_name])){
			return '';
		}
		return htmlentities($_POST[$value_name]);
	}


	function obtenerscript(){
		return htmlentities($_SERVER['PHP_SELF']);
	}


	function LogOut(){
		session_start();
		$sessionvar = $this->obtenervarsesion();
	}
}
?>