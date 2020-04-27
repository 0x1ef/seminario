
<?php
	session_start();
	
	if(!isset($_SESSION["usuario"])){
		header("Location:../index.php");
	}
?>
<header><h1>Panel de administracion</h1></header>
<a class="btn btn-primary" href="index.php?c=usuario&a=cerrars">Cerrar Sesion</a>
<div>
  <div class="row">
    <div class="col-2">
    	<h1>Menu</h1>
    	<div>
    		<nav class="nav nav-pills flex-column">
  				<a class="nav-link btn-primary" href="index.php?c=usuario&a=consultarUsuariop" class="btn btn-primary">Consultar Usuarios pendientes</a>
  				<a class="nav-link btn-primary" href="index.php?c=usuario&a=consultarUsuario">Listar usuarios</a>
 				 <a class="nav-link" href=""></a>
			</nav>
    	</div>
    </div>
    <div class="col-6">
    	<div class="centrar">
    		<h1></h1>
        </div>
    </div>
  </div>
</div>

