<?php
/*
 * consigue la info del paciente
 * input: rut del usuario y rut del paciente
 * output: info del medico (nombre, foto, etc)y del paciente (nombre, direccion, etnia, prevision, condiciones, alegias, recetas y seguro)
 */
	// consulta a Realizar a la base de datos del usuario 
	include_once(dirname(__FILE__)."/../Capa_Controladores/alergia.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/condicion.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/paciente.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/persona.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/direccion.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/comuna.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/provincia.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/region.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/etnia.php");
	include_once(dirname(__FILE__)."/../Capa_Controladores/prevision.php");
	include_once(dirname(__FILE__).'/../Capa_Controladores/unidadDeConsumo.php');
        include_once(dirname(__FILE__).'/../Capa_Controladores/unidadFrecuencia.php');
        include_once(dirname(__FILE__).'/../Capa_Controladores/unidadPeriodo.php');
        include_once(dirname(__FILE__).'/../Capa_Controladores/seguro.php');
        $unidadDeConsumo = UnidadDeConsumo::Seleccionar('where 1=1');
        $unidadFrecuencia = UnidadFrecuencia::Seleccionar('where 1=1');
        $unidadPeriodo = UnidadPeriodo::Seleccionar('where 1=1');
        $RUTMedico=$_SESSION['RUT'];
	$RUTPaciente = $_SESSION['RUTPaciente'];
	$medico = Persona::Seleccionar("WHERE RUN = '$RUTMedico'");
	$medico = $medico[0];
	$paciente1 = Paciente::Seleccionar("WHERE Personas_RUN = '$RUTPaciente'");
	$paciente1 =$paciente1[0]; 
	$paciente2 = Persona::Seleccionar("WHERE RUN = '$RUTPaciente'");
	$paciente2 = $paciente2[0];
	$direccion=$paciente2['Direccion_idDireccion'];
	$direccion = Direccion::Seleccionar("WHERE idDireccion = '$direccion'"); 
	$direccion = $direccion[0];
	$comuna=$direccion['Comuna_idComuna'];
	$comuna = Comuna::Seleccionar("WHERE idComuna = '$comuna'"); 
	$comuna=$comuna[0];
	$provincia=$comuna['Provincias_idProvincia'];
	$provincia = Provincia::Seleccionar("WHERE idProvincia = '$provincia'"); 
	$provincia=$provincia[0];
	$region=$provincia['Regiones_idRegion'];
	$region = Region::Seleccionar("WHERE idRegion = '$region'"); 
	$region=$region[0];
	$etnia=$paciente1['Etnias_idEtnias'];
	$etnia = Etnia::Seleccionar("WHERE idEtnias = '$etnia'"); 
	$etnia=$etnia[0];
	$prevision=$paciente2['Prevision_rut'];
	$prevision=Prevision::Seleccionar("WHERE rut = '$prevision'");
	$prevision=$prevision[0];
	$idPaciente=$paciente1['idPaciente'];
	$condiciones = Paciente::R_CondicionPaciente($idPaciente);
	$tiposAlergias = Paciente::AlergiasTipoPaciente($idPaciente);
	$paciente = array_merge($paciente1, $paciente2, $direccion);
	$consultas = Paciente::ConsultasPaciente($idPaciente);
        $seguro=$paciente1['Seguros_idSeguros'];
        $seguro = Seguro::Seleccionar("WHERE idSeguros = '$seguro'");
	$seguro =$seguro[0];
?>
