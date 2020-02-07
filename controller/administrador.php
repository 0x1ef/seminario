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

    public function eliminar(){
    	$this->model->id = $_REQUEST['id'];
    	$this->model->eliminar();
        echo "<script>alert('El usuario se elimino correctamente')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?c=usuario&a=consultarUsuario'>";
    	
    }
}
?>