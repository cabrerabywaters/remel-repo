<?php

include_once('../Capa_Controladores/comuna.php');

 
 $letras= $_POST['name_startsWith'];

$comunas = Comuna::BuscarComunaPorRegionYNombre($letras);

echo json_encode($comunas);

?>