<html>
<head>
    <title>Cargar Archivos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<main>    
<?php
	$nombre=$_FILES['subir']['name'];
	$ruta='C:/xampp/htdocs/www/POO/productos/archivo/';
	$descripcion=$_POST['desc'];
	$size=$_FILES['subir']['size'];
	$tipo=$_FILES['subir']['type'];
	if(move_uploaded_file($_FILES['subir']['tmp_name'], $ruta.$nombre)){
		try{
			$bd= new PDO("mysql:host=localhost;dbname=seminario","root","u4ds123321");
			$sql="INSERT INTO archivos(nombre,descripcion,ruta,tipo,size) VALUES(:nombre,:descripcion,:ruta,:tipo,:size)";
			$resultado=$bd->prepare($sql);
			$resultado->bindValue(":nombre",$nombre);
			$resultado->bindValue(":descripcion",$descripcion);
			$resultado->bindValue(":ruta",$ruta);
			$resultado->bindValue(":tipo",$tipo);
			$resultado->bindValue(":size",$size);
			$resultado->execute();
			echo "el archivo se cargo correctamente";

		}catch(Exception $e){
			die("Erro no se cargo el archivo".$e->getMessage());
		}
	}
?>
    </main>
    <a href="index.html" class="btn btn-primary">Volver</a>
    <a href="mostrar.php" class="btn btn-primary">Mostrar Archivos</a>
</body>
</html>