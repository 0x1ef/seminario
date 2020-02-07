<?php
class Usuario{
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
	public function login(){
		//try{
			$sql="SELECT * FROM usuario WHERE nombreusuario='".$this->nombreUsuario."' AND pass='".$this->pass."' AND estado=1";
			$resultado=$this->pdo->prepare($sql);
			$resultado->execute();
			$tmp1 = $resultado->fetchAll();
			if($tmp1){
				$this->nombre=$tmp1[0]['nombre'];
				$this->apellido=$tmp1[0]['apellido'];
				$this->correo=$tmp1[0]['correo'];
				$this->tipodeusuario=$tmp1[0]['tipodeusuario'];
			}
			//return $resultado->fetchAll();
			return $tmp1;
		//}catch(Exception $e){
		//	die($e->getMessage());
		//}
	}
	public function Registraru(){
		try{
			$sql=" INSERT INTO usuario(nombre,apellido,correo,pass,tipodeusuario,estado,nombreusuario) VALUES('".$this->nombre."','".$this->apellido."','".$this->correo."','".$this->pass."',2,0,'".$this->nombreUsuario."')";
			$resultado=$this->pdo->prepare($sql);
			$resultado->execute();
		}catch(Exception $e){
			die("Error no se puedo registrar el usuario".$e->getMessage());
		}
	}
	public function consultarUsuariop(){
		try{
				$sql="SELECT * FROM usuario WHERE estado = 0";
				$resultado=$this->pdo->prepare($sql);
				$resultado->execute();
				$tmp1=$resultado->fetchAll();
				return $tmp1;
		}catch(Exception $e){
				die("Error al consultar los usuarios ".$e->getMessage());
		}
	}

	public function consultarUsuario(){
		try{
			$sql="SELECT * FROM usuario";
			$resultado=$this->pdo->prepare($sql);
			$resultado->execute();
			$tmp1=$resultado->fetchAll();
			return $tmp1;
		}catch(Exception $e){
				die("Erro al consultar usuarios".$e->getMessage());
		}

	}

	public function activar(){
		$sql="UPDATE usuario set estado=1 where id=:ids";
		$resultado=$this->pdo->prepare($sql);
		$resultado->bindValue(':ids',$this->id);
		$resultado->execute();
		$sql2="SELECT nombreusuario FROM usuario WHERE id=:id";
		$resultado2=$this->pdo->prepare($sql2);
		$resultado2->bindValue(':id',$this->id);
		$resultado2->execute();
		$tmp=$resultado2->fetchAll();
		$this->nombreUsuario=$tmp[0]['nombreusuario'];
	}
}
