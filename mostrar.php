<html>
    <head>
        <title>Mostrar Archivos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body>
    <header>
        header
    </header>
    <main>
    <h1>Administrar Archivos</h1>
<?php
	//require 'conexion.php';
	$bd= new PDO("mysql:host=localhost;dbname=seminario","root","u4ds123321");
	$sql="SELECT * FROM archivos";
	$resultado=$bd->prepare($sql);
    $resultado->execute();
	$resultado=$resultado->fetchAll();
	echo "<form method='POST' action='ejecutar.php'>";
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
	echo "<a href='index.html' class='btn btn-primary'>Volver</a>";
	echo "</form>";
?>
    
    </main>
	
    <footer>Pie de pagina</footer>
</body>
</html>