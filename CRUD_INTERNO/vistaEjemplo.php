<?php
/*
este archivo esta echo para que se inserte dentro del crud
@author Leonardo Hidalgo
*/

// funcion que generara las tablas en el crud , requiere la variable arreglo que es la que proviene desde el servidor 


function visualizacionTabla($arreglo)
{	

echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
echo"<thead>";
echo "<tr>";
// se iguala solo el arreglo primario para obtener los nombres de las tablas
$encabezado=$arreglo[0];
// se ordena los nombres en un foreach
foreach ($encabezado as $dato=> $valor)
{
// se muestra el encabezado de la tabla
echo"<th>".$dato."</th>";

}
//cierra la fila 
echo "</tr>";
echo"</thead>";
echo"<tbody>";
   
		// se vuelve a crear ordenar los arreglos nuevamente
$contador=0;
foreach ($arreglo as $datos)
{
	// crea la filas de la tabla 
	echo"<tr id='$contador' class='gradeA'>";
	$contador++;

// se ordenan los arreglos internos
	foreach ($datos as $dato=>$valor)
	{// se mientra el valor de cada arreglo interno en una fila
		echo "<td>$valor</td>";

	} 

		echo"</tr>";
       
}


	echo"</tbody>";
echo"<tfoot>";
echo "<tr>";
// se iguala solo el arreglo primario para obtener los nombres de las tablas
$encabezado=$arreglo[0];
// se ordena los nombres en un foreach
foreach ($encabezado as $dato=> $valor)
{
// se muestra el encabezado de la tabla
echo"<th>".$dato."</th>";

}
//cierra la fila 
echo "</tr>";
echo"</tfoot>";
 echo"</table>";


 }
 ?>
