<?php

include_once(dirname(__FILE__) . '/../Capa_Controladores/paciente.php');

$actualizado = Paciente::ActualizarPorId($idPaciente);

echo json_encode($actualizado);


?>