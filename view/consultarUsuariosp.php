<?php

	if(!isset($_SESSION["usuario"])){
		header("Location:../index.php");
	}
	echo "<header><h1>Usuarios Pendientes </h1></header>";
	echo "<form method='POST' action='index.php?c=usuario&a=activar'>";
	echo "<table class='table table-bordered>'";
	echo "<tr class='table-primary'>";
	echo "<th>Nombre</th><th>apellido</th><th>correo</th><th>nombre de usuario</th><th>Seleccionar</th>";
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
	echo "<input class='btn btn-success' type='submit' value='activar'>";
	echo "<a href='index.php?c=administrador&a=index' class='btn btn-primary'>Volver</a>";
	echo "</form>";
?>
