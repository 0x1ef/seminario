<?php
require_once 'model/administrador.php';
class AdministradorController{
	private $model;

	public function __CONSTRUCT(){
        $this->model = new Administrador();
    }
    public function index(){
    	require_once 'view/header.php';
    	require_once 'view/administrador.php';
    	require_once 'view/footer.php';
    }
}
?>