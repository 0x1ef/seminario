<?php
    echo "<h1>Administrar Archivos</h1>";

	echo "<form method='POST' action='index.php?c=archivo&a=ejecutar'>";
    echo "<table class='table table-bordered'>";
    echo "<tr class='table-primary'>";
    echo "<th>Nombre</th><th>Descripcion</th><th>Tipo</th><th>Seleccionar</th>";
    echo "</tr>";
	foreach ($resultado as $valor){
        echo "<tr>";
        echo "<td>".$valor['nombre']."</td>"; 
		echo "<td>".$valor['descripcion']."</td>";
        echo "<td>".$valor['tipo']."</td>";
		echo "<td><input type='radio' name='ejecutar' value='".$valor['nombre']."'></td>";
        echo "</tr>";
	}
    echo "</table>";
	echo "<input class='btn btn-primary' type='submit' value='ejecutar'>";
	echo "<a href='index.php' class='btn btn-primary'>Volver</a>";
	echo "</form>";

?>
