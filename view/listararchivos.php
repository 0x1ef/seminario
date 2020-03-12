<header><h1>Archivos</h1></header>
<table class="table table-bordered">
	<tr>
		<th>nombre</th><th>opciones</th>
	</tr>
	<?php
		foreach($var2 as $valor){
			if($valor!=$this->model->nombre){
				echo "<tr>";
				echo "<td>".$valor."</td>";
				echo "<td> <a href='index.php?c=archivo&a=modificararchivo&nombre=".$valor."&r=".$this->model->ruta."'> <i class='fas fa-edit fa-2x'></i></a> <a href='#'><i class='fas fa-trash-alt fa-2x'></i></a> </td>";
				echo "</tr>";
			}else{
				echo "<tr>";
				echo "<td>".$valor."</td>";
				echo "<td><a href='#'> <i class='fas fa-edit fa-2x'></i></a></td>";
				echo "</tr>";
				$titulo=$valor;
				echo "<input type='hidden' name='tarea' value='".$valor."'>";
			}
		}
?>
</table>
<a href="index.php?c=archivo&a=resultados" class="btn btn-primary">volver</a>