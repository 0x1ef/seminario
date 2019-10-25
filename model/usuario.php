<?php
class Usuario{
	private $pdo;

	public $nombre;
	public $apellido;
	public $correo;
	public $nombreUsuario;
	public $pass;
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
			return $resultado->fetchAll();
		//}catch(Exception $e){
		//	die($e->getMessage());
		//}
	}
	public function Registraru(){
		try{
			$sql=" INSERT INTO usuario(nombre,apellido,correo,pass,tipodeusuario,estado,nombreusuario) VALUES('".$this->nombre."','".$this->apellido."','".$this->correo."','".$this->pass."',2,0,'".$this->nombreUsuario."')";
			$resultado=$this->pdo->prepare($sql);
			$resultado->execute();
			echo "El usuario se registro correctamente, se requiere aprobacion del administrador";
		}catch(Exception $e){
			die("Error no se puedo registrar el usuario".$e->getMessage());
		}
	}
}