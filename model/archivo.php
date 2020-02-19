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
			$stm = $this->pdo->prepare("SELECT * FROM archivos");
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
}
