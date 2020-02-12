<header><h1>Modificar Usuario<h1></header>
	<div class="centrar">
		<form method="post" action="index.php?c=administrador&a=actualizacion" class="px-6 py-4">
			<input type="hidden" name="id" value="<?php echo $this->model->getId()?>">
			<div class="form-group row">
				<div class="col-sm-4">
					<label class="" for="nombre">Nombre</label> 
					<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $tmp1[0]['nombre']; ?>">
				</div>
			</div>
			<div class="form-group row"> 
				<div class="col-sm-4">
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $tmp1[0]['apellido']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4">
					<label for="usuario">Usuario</label>
					<input type="text" name="nombreusr" id="usuario" class="form-control" value="<?php echo $tmp1[0]['nombreusuario']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4">
					<label for="email">Correo </label> 	
					<input type="email" name="correo" id="email" class="form-control" value="<?php echo $tmp1[0]['correo']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4">
					<label for="contraseña">Contraseña</label>
					<input type="password" name="pass" id="contraseña" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div clas="col-sm-4">
					<label for="tipo">Tipo de usuario</label>
					<?php
						if($tmp1[0]['tipodeusuario'] == 2){
							echo "<select class='custom-select' name='tipo'>";
							echo "<option value='2' selected>Comun</option>";
							echo "<option value='1'>Administrador</option>";
							echo "</select>";
						} else{
							echo "<select class='custom-select' name='tipo'>";
							echo "<option value='1' selected>Administrador</option>";
							echo "<option value='2'>Comun</option>";
							echo "</select>";
						}
					?>
				</div>
			</div>

		<button type="submit" class="btn btn-success">Aceptar</button>
		<input type="button" class="btn btn-primary" value="volver" onclick="location='index.php?c=usuario&a=consultarUsuario'">
		</form>
	</div>

