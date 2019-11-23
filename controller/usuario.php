<?php
require_once 'model/usuario.php';

class UsuarioController{
	private $model;

	public function __CONSTRUCT(){
		$this->model = new Usuario();
	}
	public function login(){
		$tmp = new Usuario();
		//cargar datos de usuario
		$tmp->nombreUsuario = $_POST['usuario'];
		$tmp->pass = $_POST['pass'];
		if($tmp->login()){
			if($tmp->tipodeusuario==1){
				if(!isset($_SESSION)){
					session_start();
				}
				$_SESSION["usuario"]=$tmp->nombreUsuario;
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
		$tmp = new Usuario();
		$tmp->nombre = $_POST['nombre'];
		$tmp->apellido = $_POST['apellido'];
		$tmp->correo = $_POST['correo'];
		$tmp->nombreUsuario=$_POST['nombreusr'];
		$tmp->pass = $_POST['pass'];
		$tmp->Registraru();
		require_once 'view/header.php';
		require_once 'view/footer.php';
	}

	public function consultarUsuariop(){
			$tmp = new Usuario();
			$datos=$tmp->consultarUsuariop();
			require_once 'view/header.php';
			require_once 'view/consultarUsuariosp.php';
			require_once 'view/footer.php';

	}
	public function activar(){
		$tmp = new Usuario();
		$tmp->id=$_POST['validar'];
		$tmp->activar();
		$ruta='files/'.$tmp->nombreUsuario;
		mkdir($ruta,0777);
		echo "Se activo el usuario";
	}
}
