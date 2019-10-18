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
    
    public function Cargar(){
        $tmp = new Archivo();
        
        $tmp->nombre = $_FILES['subir']['name'];
        $tmp->descripcion = $_POST['desc'];
        $tmp->ruta = './files/';
        $tmp->tipo = $_FILES['subir']['type'];
        $tmp->size = $_FILES['subir']['size'];
		if(move_uploaded_file($_FILES['subir']['tmp_name'], $tmp->ruta.$tmp->nombre))
				$tmp->Cargar();
		else
			die("No se pudo cargar el archivo-> $tmp->ruta $tmp->nombre");
        header('Location: index.php');
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
	public function Registrar(){
		require_once 'view/header.php';
		require_once 'view/registrar.html';
		require_once 'view/footer.php';
	}
	
	public function Registraru(){
		echo "registro un usuario";
		require_once 'view/header.php';
		require_once 'view/footer.php';
	}
}
