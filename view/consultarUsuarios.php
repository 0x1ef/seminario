<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
		header("Location:../index.php");
	}
	echo "<header><h1>Usuarios</h1></header>";
	echo "<form method='post' action='index.php?c=usuario&a=modificar'>";
	echo "<table class='table table-bordered>'";
	echo "<tr class='table-primary'>";
	echo "<th>Nombre</th><th>apellido</th><th>correo</th><th>nombre de usuario</th><th>estado</th><th>Seleccionar</th>";
	echo "</tr>";
	foreach ($datos as $valor){
		echo "<tr>";
		echo "<td>".$valor['nombre']."</td>";
		echo "<td>".$valor['apellido']."</td>";
		echo "<td>".$valor['correo']."</td>";
		echo "<td>".$valor['nombreusuario']."</td>";
		echo "<td>".$valor['estado']."</td>";
		echo "<td><input type='radio' name='validar' value='".$valor['id']."'></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<button type='submit' class='btn btn-success'>Modificar</button>";
	echo "<button type='submit' formaction='index.php?c=usuario&a=eliminar' class='btn btn-danger'>Eliminar</button>";
	echo "</form>";
	echo "<a href='index.php' class='btn btn-primary'>volver</a>";
	
?>