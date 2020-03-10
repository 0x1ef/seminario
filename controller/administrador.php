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

    public function modificar(){
        $this->model->setId($_REQUEST['id']);
        if(empty($this->model->id) || !$this->model->existe()){
            header ('location: index.php?c=usuario&a=consultarUsuario');
        }else{
            $tmp1=$this->model->obtenerDatos();
            require_once 'view/header.php';
            require_once 'view/modificar.php';
            require_once 'view/footer.php';
        }
    }

    public function actualizacion(){
        
        $this->model->setNombre($_POST['nombre']);
        $this->model->setApellido($_POST['apellido']);
        $this->model->setNombreUsuario($_POST['nombreusr']);
        $this->model->setCorreo($_POST['correo']);
        $this->model->setTipo($_POST['tipo']);
        $this->model->setPass($_POST['pass']);
        $this->model->setId($_POST['id']);
        $this->model->actualizarD();
        echo "<script>alert('El usuario se actualizo correctamente')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?c=usuario&a=consultarUsuario'>";

        
    }
}
?>