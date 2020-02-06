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
}

?>