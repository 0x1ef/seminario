<?php
require_once 'model/archivo.php';

class ArchivoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Archivo();
    }
    
    public function listarTareas(){

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
            echo $this->model->ruta.$this->model->nombre.'/'.$this->model->nombre;
        }

        echo "<script>alert('la tarea se cargo correctamente')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?c=usuariocomun&a=index'>";
	}

	public function Ejecutar(){
		
		if(!empty($_POST['ejecutar']) && $_FILES['comandos']['name']){
			$file = $_POST['ejecutar'];
            $usuario= $_POST['idusuario'];
            $nombreUsuario=$this->model->obtenerUsr($usuario);
            $this->model->nombre= $_FILES['comandos']['name'];
            //echo " EL nombre es: ".$this->model->nombre;
            //echo " se ejecuto la tarea".$file." del usuario : ".$nombreUsuario;
            $this->model->ruta="files/".$nombreUsuario."/".$file."/".$this->model->nombre;

            if(move_uploaded_file($_FILES['comandos']['tmp_name'],$this->model->ruta)){
                    $this->model->ejecutar($file);
                    shell_exec("./script.sh files/".$nombreUsuario."/".$file." ".$this->model->nombre." log.txt");
                    $this->model->finalizar($file);
                    echo "<meta http-equiv='refresh' content='0; url=index.php?c=archivo&a=listar'>";

             }else{
                die("Error No se pudo cargar el archivo ");
            }
			require_once 'view/header.php';
			require_once 'view/ejecutar.php'; 
			require_once 'view/footer.php';	
		}else{
			echo "Error Seleccione un archivo o suba los comandos de ejecución";
		}
		
	}

    public function resultados(){
        $var=$this->model->resultados();
        require_once 'view/header.php';
        require_once 'view/resultados.php';
        require_once 'view/footer.php';
    }

    public function obtenerResultados(){
       if(!empty($_REQUEST['resultados'])){
            $idusuario=$_REQUEST['idusuario'];
            $this->model->nombreUsuario=$this->model->obtenerUsr($_REQUEST['idusuario']);
            $this->model->nombre=$_REQUEST['resultados'];
            $this->model->ruta="files/".$this->model->nombreUsuario."/".$this->model->nombre;
            //echo "ruta es: ".$this->model->ruta." ";
            //echo $this->model->nombre;
            //echo $this->model->nombreUsuario;
            exec("ls ".$this->model->ruta,$var2);
            require_once 'view/header.php';
            require_once 'view/listararchivos.php';
            require_once 'view/footer.php';
        }else{
            echo "selecione una tarea";
        }
    }

    public function modificararchivo(){
        $this->model->nombre=$_REQUEST['nombre'];
        $this->model->ruta=$_REQUEST['r'];
        $titulo= $_REQUEST['titulo'];
        $idusuario = $_REQUEST['idusuario'];
        //echo $titulo;
        $rutaArchivo=$this->model->ruta."/".$this->model->nombre;
        //echo $rutaArchivo;
        require_once 'view/header.php';
        require_once 'view/modificararchivos.php';
        require_once 'view/footer.php';

    }

    public function confirmarmodificacion(){
        $fn= $_POST['r'];
        $titulo= $_POST['titulo'];
        $idusuario=$_POST['idusuario'];
        //echo $fn;
        $content = stripslashes($_POST['archivo']);
        $fp = fopen($fn,"w") or die ("Error al abrir el archivo");
        fputs($fp,$content);
        fclose($fp) or die ("Error al cerrar el archivo");
        echo "<script> alert('Se modifico con exito')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php?c=archivo&a=obtenerResultados&resultados=$titulo&idusuario=$idusuario'>";
        
    }

    public function eliminararchivo(){
        $this->model->ruta=$_POST['r'];

    }
}
