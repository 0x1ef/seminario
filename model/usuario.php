<?php
class Usuario{
	private $pdo;

	public $nombre;
	public $apellido;
	public $correo;
	public $nombreUsuario;
	public $pass;
	public $tipodeusuario;
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
			echo "El usuario se registro correctamente, se requiere aprobacion del administrador";
		}catch(Exception $e){
			die("Error no se puedo registrar el usuario".$e->getMessage());
		}
	}
}