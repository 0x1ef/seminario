<?php
require_once 'model/archivo.php';

class ArchivoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Archivo();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/index.html';
        require_once 'view/footer.php';
    }
    
    public function Listar(){

		$resultado = $this->model->Listar();

        require_once 'view/header.php';
        require_once 'view/mostrar.php'; 
        require_once 'view/footer.php';	
    }
    
    public function CargarTarea(){
        $nombreUsuario = $_POST['nombreUsuario'];
        $idUsuario = $_POST['id'];
        $this->model->nombre = $_FILES['subir']['name'];
        $this->model->descripcion = $_POST['desc'];
        $this->model->ruta = './files/'.$nombreUsuario.'/';
        $this->model->tipo = $_FILES['subir']['type'];
        $this->model->size = $_FILES['subir']['size'];
		$carpeta='files/'.$nombreUsuario.'/'.$this->model->nombre;
        echo $carpeta;
        mkdir($carpeta,0777);
        if(move_uploaded_file($_FILES['subir']['tmp_name'], $this->model->ruta.$this->model->nombre.'/'.$this->model->nombre)){
				$this->model->Cargar($idUsuario);
		}else{
			die("No se pudo cargar el  $this->model->ruta $this->model->nombre");
        }

        echo "<script>alert('la tarea se cargo correctamente')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?c=usuariocomun&a=index'>";
	}

	public function Ejecutar(){
		
		if($_POST['ejecutar']){
			$file = $_POST['ejecutar'];
			
			require_once 'view/header.php';
			require_once 'view/ejecutar.php'; 
			require_once 'view/footer.php';	
		}else{
			echo "Error Seleccione un archivo";
		}
		
	}
}
