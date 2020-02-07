<header><h1>Modificar Usuario<h1></header>
	<div class="centrar">
		<form method="post" action="index.php?c=usuario&a=registraru" class="px-6 py-4">
			<div class="form-group row">
				<div class="col-sm-4">
					<label class="" for="nombre">Nombre</label> 
					<input type="text" name="nombre" id="nombre" class="form-control">
				</div>
			</div>
			<div class="form-group row"> 
				<div class="col-sm-4">
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" id="apellido" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4">
					<label for="usuario">Usuario</label>
					<input type="text" name="nombreusr" id="usuario" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4">
					<label for="email">Correo </label> 	
					<input type="email" name="correo" id="email" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-4">
					<label for="contraseña">Contraseña</label>
					<input type="password" name="pass" id="contraseña" class="form-control">
				</div>
			</div>
		<button type="submit" class="btn btn-success">Aceptar</button>
		<input type="button" class="btn btn-primary" value="volver" onclick="location='index.php'">
		</form>
	</div>

