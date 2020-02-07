<?php
class Administrador{
	private $pdo;
	public $nombre;
	public $apellido;
	public $correo;
	public $nombreUsuario;
	public $pass;
	public $tipodeusuario;
	public $id;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Database::Startup();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function eliminar(){
		try{
			$sql="DELETE FROM usuario WHERE id=:id";
			$resultado=$this->pdo->prepare($sql);
			$resultado->bindValue(':id',$this->id);
			$resultado->execute();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function existe(){
		$sql="SELECT  id FROM usuario WHERE id=:id";
		$resultado=$this->pdo->prepare($sql);
		$resultado->bindValue(':id',$this->id);
		$resultado->execute();
		$tmp = $resultado->fetchAll();
		if(!empty($tmp)){
			return true;
		}else {
			return false;
		}
	}
}

?>