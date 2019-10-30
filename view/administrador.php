
<?php
	session_start();
	
	if(!isset($_SESSION["usuario"])){
		header("Location:../index.php");
	}
?>
<header><h1>Panel de administracion</h1></header>
<main>
	<p><a href="index.php?c=usuario&a=consultarUsuariop" class="btn btn-primary">Consultar Usuarios pendientes</a><p>
	
</main>
</html>
