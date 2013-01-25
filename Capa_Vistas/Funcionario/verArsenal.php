<?php
include(dirname(__FILE__) . "/../../Capa_Controladores/paciente.php");
//buscar Recetas del cliente
?>

<div class="accordion-heading">
    <a class="btn btn-large btn-block active" data-toggle="collapse" data-parent="#accordion2" >
        Arsenal de <?php //$_SESSION['nomLugar'] ?>
    </a>
</div>
<div><center>
    <button id="volver" class="btn btn-primary" onClick="volver()" type="submit"><strong>Volver</strong></button>
</center></div><hr>
<div class="accordion-body">
    <div class="accordion-inner">
        <?php
        //$fechaActual = date('y-m-d');
        $fechaActual = date("Y-m-d H:i:s");
        $recetasPaciente = Paciente::R_RecetasPacienteVigentes($_SESSION['idPaciente'], $fechaActual);
        echo'
  <div class="row">

  <center> <div style="width: 50%; ;">
  <table>
                <tr><td>
   <table class="table table-striped">
	<thead>
    <tr>
    <th>Medico</td>
    <th>Fecha de Emision</td>
    <th>Fecha de Vencimiento</td>
    <th>Medicamentos</td>
    </tr></thead>
    ';
        foreach ($recetasPaciente as $datos => $dato) {
            echo "<tr>";
            foreach ($dato as $llave => $valor) {
                if ($llave == 'Id_consulta') {
                    echo '<td>';
                    $medicamentosConsulta = Paciente::R_MedicamentosConsulta($valor);
                    for ($i = 0; $i < count($medicamentosConsulta); $i++) {
                        echo $medicamentosConsulta[$i]['Nombre_Comercial'] . '</br>';
                    }
                }
                if ($llave == 'Nombre') {
                    echo '<td>';
                    echo $valor . ' ';
                }
                if ($llave == 'Apellido_Paterno') {
                    echo $valor;
                    echo '</td>';
                }
                if ($llave == 'Fecha_Emision' || $llave == 'Fecha_Vencimiento') {
                    echo '<td>';
                    echo $valor;
                    echo '</td>';
                }
            }
            echo '<td>';
            echo 'Expender';
            echo '</td>';
            echo "</tr>";
        }
        echo '</table></div></table></center></div>';
        ?>
    </div>
</div>
<script>
    
    function volver(){
        window.location.href = 'funcionarioIndex.php#';
    }
    
</script>