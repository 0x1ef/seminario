<?php
	try{
			$bd= new PDO("mysql:host=localhost;dbname=seminario","root","u4ds123321");
		
		}catch(Exception $e){
			die("Erro no se conecto a la base de datos".$e->getMessage());
		}
?>