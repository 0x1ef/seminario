<?php
class Archivo
{
	private $pdo;
    
    public $id;
    public $nombres;
    public $descripcion;
    public $ruta;
    public $tipo;
    public $size;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM tarea");
			$stm->execute();

			return $stm->fetchAll();
			//~ return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Cargar($idUsuario)
	{
		try{
			$sql="INSERT INTO tarea(titulo,descripcion,estado,usuario) VALUES(:titulo,:descripcion,1,:id)";
			$resultado=$this->pdo->prepare($sql);
			$resultado->bindValue(":titulo",$this->nombre);
			$resultado->bindValue(":descripcion",$this->descripcion);
			$resultado->bindValue(":id",$idUsuario);
			$resultado->execute();
		}catch(Exception $e){
			die("Erro no se cargo el archivo".$e->getMessage());
		}
	}

	public function ejecutar($nombre){
		$sql="UPDATE tarea SET estado=2 where titulo='$nombre'";
		$resultado=$this->pdo->prepare($sql);
		$resultado->execute();
	}

	public function finalizar($nombre){
		$sql="UPDATE tarea SET estado=3 where titulo='$nombre'";
		$resultado=$this->pdo->prepare($sql);
		$resultado->execute();
	}
	
	public function obtenerUsr($id){
		$sql="SELECT nombreusuario FROM usuario where id=:id";
		$resultado=$this->pdo->prepare($sql);
		$resultado->bindValue(":id",$id);
		$resultado->execute();
		$var=$resultado->fetchAll();
		return $var[0]['nombreusuario'];
	}

	public function resultados(){
		$sql="SELECT usuario,titulo,estado,descripcion,id FROM tarea WHERE estado=2 or estado=3";
		$resultado=$this->pdo->prepare($sql);
		$resultado->execute();
		return $resultado->fetchAll();
	}
}
