<header><h1>Modificar archivo</h1></header>
<div>
	<form method="POST" action="index.php?c=archivo&a=confirmarmodificacion">
	<div class="row">
			<div class="col-2"></div>		
			<div class="col-4">
				<label for="txt"><?php echo "archivo: <b>".$this->model->nombre ?></b></label>
				<textarea name="archivo" cols="140" rows="23" ><?php readfile($rutaArchivo)?></textarea>
			</div>
			<div class="col-4"></div>
	</div>
	<input type="hidden" name="idusuario" value="<?php echo $idusuario?>">
	<input type="hidden" name="titulo" value="<?php echo $titulo ?>">
	<input type="hidden" name="r" value="<?php echo $rutaArchivo;?>">
	<input type="submit" value="Modificar" class="btn btn-success">
	<a href="index.php?c=archivo&a=obtenerResultados&resultados=<?php echo $titulo ?>&idusuario=<?php echo $idusuario?>" class="btn btn-primary">Volver</a>

	</form>
</div>