<?php
require_once 'model/usuariocomun.php';
class UsuarioComunController{
	private $model;

	public function __CONSTRUCT(){
		$this->model = new UsuarioComun();
	}

	public function index(){
		require_once 'view/header.php';
		require_once 'view/usuarioComun.php';
		require_once 'view/footer.php';
	}
}
?>