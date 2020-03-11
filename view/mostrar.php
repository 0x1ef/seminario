<?php
    echo "<header><h1>Ejecutar tareas</h1></header>";

	echo "<form method='POST' action='index.php?c=archivo&a=ejecutar' enctype='multipart/form-data'>";
    echo "<table class='table table-bordered'>";
    echo "<tr class='table-primary'>";
    echo "<th>Nombre</th><th>Descripcion</th><th>estado</th><th>Seleccionar</th>";
    echo "</tr>";
	foreach ($resultado as $valor){
        echo "<tr>";
        echo "<td>".$valor['titulo']."</td>"; 
		echo "<td>".$valor['descripcion']."</td>";
        if($valor['estado']==1){echo "<td>pendiente</td>";}else{if($valor['estado']==2){echo "<td>ejecutando</td>";}else{echo "<td>finalizado</td>";}}
        //echo "<td>".$valor['estado']."</td>";
		echo "<td><input type='radio' name='ejecutar' value='".$valor['titulo']."'></td>";
        echo "<input type='hidden' name=idusuario value='".$valor['usuario']."'";
        echo "</tr>";
	}
    echo "</table>";
    echo "
    <div class='form-group'>
        <label for='com'>Comandos:</label>
        <input class='form-control-file' type='file' name='comandos'>
    </div>";
	echo "<input class='btn btn-primary' type='submit' value='ejecutar'>";
	echo "<a href='index.php?c=usuariocomun&a=index' class='btn btn-primary'>Volver</a>";
	echo "</form>";

?>
