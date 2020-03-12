<header><h1>Resultasdos</h1></header>
<form method="POST" action=index.php?c=archivo&a=obtenerResultados>
	<table class="table table-bordered">
		<tr class="table-primary">
			<th>Nombre</th><th>descripción</th><th>estado</th><th>Selecionar</th>
		</tr>
		<?php
			foreach ($var as $valor){
				echo "<tr>";
				echo "<td>".$valor['titulo']."</td>";
				echo "<td>".$valor['descripcion']."</td>";
				if($valor['estado']==3){echo "<td>Finalizado</td>";}else{echo "<td>Pendiente</td>";}
				echo "<td><input type='radio' name='resultados' value='".$valor['titulo']."'>";
				echo "</tr>";
			}
		echo "<input type='hidden' name='idusuario' value='".$valor['usuario']."'>";
		?>
	</table>
	<input type="submit" class="btn btn-primary" value="obtener resultados">
	<a href="index.php?c=usuariocomun&a=index" class="btn btn-primary">volver</a>
</form>