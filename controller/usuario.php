<?php
require_once 'model/usuario.php';

class UsuarioController{
	private $model;

	public function __CONSTRUCT(){
		$this->model = new Usuario();
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
		$tmp->pass = $_POST['pass'];
		$tmp->Registraru();
		require_once 'view/header.php';
		require_once 'view/footer.php';
	}
}