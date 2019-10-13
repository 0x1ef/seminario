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

	public function Cargar()
	{
		try{
			$sql="INSERT INTO archivos(nombre,descripcion,ruta,tipo,size) VALUES(:nombre,:descripcion,:ruta,:tipo,:size)";
			$resultado=$this->pdo->prepare($sql);
			$resultado->bindValue(":nombre",$this->nombre);
			$resultado->bindValue(":descripcion",$this->descripcion);
			$resultado->bindValue(":ruta",$this->ruta);
			$resultado->bindValue(":tipo",$this->tipo);
			$resultado->bindValue(":size",$this->size);
			$resultado->execute();
			echo "el archivo se cargo correctamente";
		}catch(Exception $e){
			die("Erro no se cargo el archivo".$e->getMessage());
		}
	}
}
