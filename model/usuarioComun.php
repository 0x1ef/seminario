<?php
class UsuarioComun(){
	private $pdo;
	private $nombre;
	private $apellido;
	private $correo;
	private $nombreUsuario;
	private $pass;
	private $tipodeusuario;
	private $id;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Database::Startup();
		}catch(Exception $e){
			die($e->getMessage());
		}
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