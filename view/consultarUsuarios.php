<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("Location:../index.php");
	}
	echo "<header><h1>Usuarios</h1></header>";
	echo "<table class='table table-bordered>'";
	echo "<tr class='table-primary'>";
	echo "<th>Nombre</th><th>apellido</th><th>correo</th><th>nombre de usuario</th><th>estado</th><th>Accion</th>";
	echo "</tr>";
	foreach ($datos as $valor){
		echo "<tr>";
		echo "<td>".$valor['nombre']."</td>";
		echo "<td>".$valor['apellido']."</td>";
		echo "<td>".$valor['correo']."</td>";
		echo "<td>".$valor['nombreusuario']."</td>";
		echo "<td>".$valor['estado']."</td>";
		echo "<td> <a href='index.php?c=administrador&a=modificar&id=".$valor['id']."'> <i class='fas fa-edit fa-2x'></i></a> <a href='index.php?c=administrador&a=eliminar&id=".$valor['id']."'><i class='fas fa-trash-alt fa-2x'></i></a> </td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<a href='index.php?c=administrador&a=index' class='btn btn-primary'>volver</a>";
	
?>