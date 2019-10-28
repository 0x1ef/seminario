
<?php
	session_start();
	
	if(!isset($_SESSION["usuario"])){
		header("Location:index.html");
	}
?>
<main>
	<h1>Panel de administracion</h1>
	
</main>
</html>
