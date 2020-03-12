<header><h1>Administracion de tareas</h1></header>
<div>
  <div class="row">
    <div class="col-2">
    	<h1>Menu</h1>
    	<div>
    		<nav class="nav nav-pills flex-column">
 				<a class="nav-link active" href="#">Crear Tarea</a>
  				<a class="nav-link" href="index.php?c=archivo&a=listar">Listar Tareas</a>
 				 <a class="nav-link" href="index.php?c=archivo&a=resultados">Listar resultados</a>
			</nav>
    	</div>
    </div>
    <div class="col-6">
    	<div class="centrar">
    		<h1>Cargar Tarea</h1>
    		<div>
    			<form method="post" action="index.php?c=archivo&a=cargarTarea" enctype="multipart/form-data" class="px-6 py-4">
                    <input type="hidden" name="id" value="<?php echo $this->model->getId();?>">
                    <input type="hidden" name="nombreUsuario" value="<?php echo $this->model->getNombreUsuario();?>">
    				<div class="form-group row">
    					<div class="col-sm-4">
    						<label for="titulo">Descripcion</label>
    						<input type="text" name="desc" id="titulo" class="form-control">
    					</div>
    				</div>
    				<div class="form-group row">
    					<div class="col-sm-4">
    						<label for="desc">Archivo</label>
    						<input type="file" name="subir" id="desc" class="form-control-file">
    					</div>
    				</div>
                    <button type="submit" class="btn btn-success" name="enviar">Cargar</button>
    			<form>
    		</div>
    	</div>
    </div>
  </div>
</div>