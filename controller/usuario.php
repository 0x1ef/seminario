<?php
require_once 'model/usuario.php';

class UsuarioController{
	private $model;

	public function __CONSTRUCT(){
		$this->model = new Usuario();
	}

	public function Index(){
		if(isset($_SESSION['usuario'])){
			switch ($_SESSION['tipo']) {
				case 1:
					header ('Location: index.php?c=administrador&a=index');
					break;
				case 2:
					header ('Location: index.php?c=usuariocomun&a=index');
					break;
			}
		}else{
        	require_once 'view/header.php';
        	require_once 'view/index.html';
        	require_once 'view/footer.php';
        }
    }

	public function login(){
		//cargar datos de usuario
		$this->model->nombreUsuario = $_POST['usuario'];
		$this->model->pass = $_POST['pass'];
		$var2=$this->model->login();
		if($this->model->login()){
			$_SESSION['usuario'] = $var2[0]['nombre'];
			$_SESSION['idusuario'] = $var2[0]['id'];
			$_SESSION['nombreusr'] = $var2[0]['nombreusuario'];
			$_SESSION['tipo'] = $var2[0]['tipodeusuario']; 
		}
			header ('Location: index.php?c=usuario&a=index');
		
			
	}
	public function cerrars(){
		$_SESSION=array();
		session_destroy();
		header ('Location: index.php?c=usuario&a=index');

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

}
