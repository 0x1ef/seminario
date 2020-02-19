<?php
require_once 'model/usuario.php';

class UsuarioController{
	private $model;

	public function __CONSTRUCT(){
		$this->model = new Usuario();
	}
	public function login(){
		//cargar datos de usuario
		$this->model->nombreUsuario = $_POST['usuario'];
		$this->model->pass = $_POST['pass'];
		if($this->model->login()){
			if($this->model->tipodeusuario==1){
				if(!isset($_SESSION)){
					session_start();
				}
				$_SESSION["usuario"]=$this->model->nombreUsuario;
				require_once 'view/header.php';
				require_once 'view/administrador.php';
				require_once 'view/footer.php';
			}else{
				if(!isset($_SESSION)){
					session_start();
				}
				require_once 'view/header.php';
				require_once 'view/usuarioComun.php';
				require_once 'view/footer.php';
			}
		}else{
			echo"Datos incorrectos O usuario no activo";
		}
	}
	public function Registrar(){
		require_once 'view/header.php';
		require_once 'view/registrar.html';
		require_once 'view/footer.php';
	}

	public function Registraru(){
		$this->model->nombre = $_POST['nombre'];
		$this->model->apellido = $_POST['apellido'];
		$this->model->correo = $_POST['correo'];
		$this->model->nombreUsuario=$_POST['nombreusr'];
		$this->model->pass = $_POST['pass'];
		$this->model->Registraru();
		echo "<scrip>alert('EL usuario se registro correctamente, es necesario aprobación del administrador')</script>";
		require_once 'view/header.php';
		require_once 'view/footer.php';
		echo "<meta http-equiv='refresh' content='1; url=index.php'>";
	}

	public function consultarUsuariop(){
			$datos=$this->model->consultarUsuariop();
			require_once 'view/header.php';
			require_once 'view/consultarUsuariosp.php';
			require_once 'view/footer.php';

	}
	public function activar(){
		$this->model->id=$_POST['validar'];
		$this->model->activar();
		$ruta='files/'.$this->model->nombreUsuario;
		mkdir($ruta,0777);
		header('Location: index.php?c=administrador&a=index');

	}
	public function consultarUsuario(){
		$datos=$this->model->consultarUsuario();
		require_once 'view/header.php';
		require_once 'view/consultarUsuarios.php';
		require_once 'view/footer.php';
	}



	public function setNombre($nombre){
		$this->nombre=$nombre;
	}

	public function setApellido($apellido){
		$this->apellido=$apellido;
	}

	public function setCorreo($correo){
		$this->correo=$correo;
	}

	public function setNombreUsuario($nombreUsuario){
		$this->nombreUsuario=$nombreUsuario;
	}

	public function setPass($pass){
		$this->pass=$pass;
	}

	public function setTipo($tipo){
		$this->tipodeusuario=$tipo;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function getNombreUsuario(){
		return $this->nombreUsuario;
	}

	public function getPass(){
		return $this->pass;
	}

	public function getTipo(){
		return $this->tipodeusuario;
	}

	public function getId(){
		return $this->id;
	}
}
