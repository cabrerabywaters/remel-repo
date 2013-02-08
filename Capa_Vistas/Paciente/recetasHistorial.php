    <div class="accordion-heading">
      <a class="btn btn-large btn-block active" data-toggle="collapse" data-parent="#accordion2">
        Recetas Historicas
      </a>
    </div>
      <div class="accordion-inner">

  <div class="row">

  <center> <div style="width: 90%; ;">
  <script type="text/javascript" charset="utf-8">
      // script del datatables que transforma las tablas comunes y les agrega autocompletar y la cantidad de datos a desplegar y aun buscador y paginacion -->
			$(document).ready(function(){
                             $('#tablaHistorialRecetas').dataTable();
                        });
		</script>
<table class="table table-bordered"  border="2" id="tablaHistorialRecetas">
	<thead style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
">
		<tr>
			<th>Medico</th>
			<th>Fecha de Emision</th>
			<th>Fecha de Vencimiento</th>
            <th>Diagnostico</th>
            <th>Medicamentos</th>
           
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($recetas as $datos => $dato) {

					echo "<tr>";            
                    echo '<td>';
					echo "".$dato['Medico']." ".$dato['Apellido_Paterno']."";
					echo '</td>';
					echo '<td>';
					$fecha = explode(" ",$dato['Fecha_Emision']);
                    echo $fecha[0];
					echo '</td>';
					echo '<td>';
                    echo $dato['Fecha_Vencimiento'];
                    echo '</td>';
                    echo '<td>';
                    echo $dato['Diagnostico'];
                    echo '</td>';
					echo '<td>';
					$contador=1;
					$medicamentoReceta = Paciente::medicamentosByIdReceta($dato['idReceta']);					
					foreach ($medicamentoReceta as $valor => $value)
					{
						$cantidad=count($medicamentoReceta);
                                                // se despliegan los datos del medicamento , si la variable contador es igual a la cnatidad de datos del array se termina el archivo sin la coma(,)
						if($contador!=$cantidad)
						{
                                        echo "".$value['Nombre_Comercial'].", ";
						}
						else
						{
					echo $value['Nombre_Comercial'];
						}
                                                
						$contador++;					
					}
                    echo '</td>';
					echo "</tr>";
			}

		?>
	</tbody>
	<tfoot style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
">
		<tr>
			<tr>
			<th>Medico</th>
			<th>Fecha de Emision</th>
			<th>Fecha de Vencimiento</th>
                        <th>Diagnostico</th>
                        <th>Medicamentos</th>
		</tr>
	</tfoot>
</table>
          
</div>
</center>
</div>
</div>
