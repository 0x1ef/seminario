<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("Location:../index.php");
	}
	echo "<h1>Usuarios Pendientes </h1>";
	echo "<form method='POST' action=''>";
	echo "<table class='table table-bordered>'";
	echo "<tr class='table-primary'>";
	echo "<th>Nombre</th><th>apellido</th><th>correo</th><th>nombre de usuario</th><th>opciones</th>";
	echo "</tr>";
	foreach ($datos as $valor){
		echo "<tr>";
		echo "<td>".$valor['nombre']."</td>";
		echo "<td>".$valor['apellido']."</td>";
		echo "<td>".$valor['correo']."</td>";
		echo "<td>".$valor['nombreusuario']."</td>";
		echo "<td><input type='radio' name='validar' value='".$valor['id']."'></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<input class='btn btn-primary' type='submit' value='activar'>";
	echo "<a href='administrador.php' class='btn btn-primary'>Volver</a>";
	echo "</form>";
?>