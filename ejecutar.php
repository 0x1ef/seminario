<html>
<head>
	<title> Ejecuciones </title>
</head>
<body>
<header></header>

<main>
<?php
	if($_POST['ejecutar']){
		echo "el archivo a ejecutar sera: ".$_POST['ejecutar'];
	}else{
		echo "Error Seleccione un archivo";
	}
?>	
</main>
</body>
</html>