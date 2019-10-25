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
			echo"Ingreso";
		}else{
			echo"Datos incorrectos";
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
}