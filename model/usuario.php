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
			$sql="INSERT INTO archivos(nombre,apellido,correo,pass,estado) VALUES(:nombre,:apellido,:correo,:pass,0)";
			$resultado=$this->pdo->prepare($sql);
			$resultado->bindValue(":nombre",$this->nombre);
			$resutado->bindValue(":apellido",$this->apellido);
			$resutado->bindValue(":correo",$this->correo);
			$resutado->bindValue(":pass",$this->pass);
			$resultado->execute();
			echo "El usuario se registro correctamente, se requiere aprobacion del administrador";
		}catch(Exception $e){
			die("Error no se puedo registrar el usuario".$e->getMessage());
		}
	}
}