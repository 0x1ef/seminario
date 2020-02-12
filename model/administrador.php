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

	public function obtenerDatos(){
		$sql="SELECT nombre,apellido,correo,tipodeusuario,nombreusuario FROM usuario WHERE id=:id";
		$resultado=$this->pdo->prepare($sql);
		$resultado->bindValue(':id',$this->id);
		$resultado->execute();
		$tmp = $resultado->fetchAll();
		return $tmp;
	}

	public function actualizarD(){
		
	}

	public function setNombre($nombre){
		$this->nombre=$nombre;
	}

	public function setApellido($apellido){
		$this->apellido=$apellido;
	}

	public function setCorreo($correo){
		$this->correo=$correo;
	}

	public function setNombreUsuario($nombreUsuario){
		$this->nombreUsuario=$nombreUsuario;
	}

	public function setPass($pass){
		$this->pass=$pass;
	}

	public function setTipo($tipo){
		$this->tipodeusuario=$tipo;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function getNombreUsuario(){
		return $this->nombreUsuario;
	}

	public function getPass(){
		return $this->pass;
	}

	public function getTipo(){
		return $this->tipodeusuario;
	}

	public function getId(){
		return $this->id;
	}
}

?>