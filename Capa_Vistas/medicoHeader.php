<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title><!-- styles -->
        
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet">
        <style> 
        /* Estilos de cargando de la barra respectiva*/
        .ui-autocomplete-loading {
        background: white url('../../img/ui-anim_basic_16x16.gif') right center no-repeat;
            }
        </style>
        <style type="text/css">
        
       body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #efefc8
      }
        
        ul.nav, .nav{
            
             background: whitesmoke;
        }
        .tabbable-fluid{
            
           
        }
        .tab-content{
            
            
        }
        .tab-pane
        {
            
            
            background-color: #fafaf0;
            
        }
        
        
         .modal{
          
           border: 5px solid #efdcc8;
      }
     .modal-header, .modal-footer{
           
           background-color: #fafaf0;
      }
      .modal-body{
          background-color: #fafaf0;
          border: 3px solid #efdcc8;
      }
        
        
        
         .modal-body a:link {text-decoration: none;
      color:white}
.modal-body a:visited {text-decoration: none;
color:white}
.modal-body a:active {text-decoration: none;
color:white}
        
    </style><!-- fin estilo de la pagina -->
  
        <!-- scripts js externos -->       
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
        <?php
        
       
		// $alergias=array("Medicamentosas" =>array("Acetil Salicilico","Corticoides","Penisilina"),"Alimentos" =>array("Maricos","Pescados","Carne"),"Ambientales" =>array("Polvo","Polen"));
		 $condiciones=array("Problemas" =>array("Hipertension","Obesidad"),"Habitos" =>array("Fumador","Deportista"));
		 $alergias1=array("agua","aceite","miel","polen","trigo");
		$condiciones1=array("agua","aceite","miel","polen","trigo");
		$recetas=array("agua","aceite","miel","polen","trigo");
				// consulta a la base de datos del usuario
				include(dirname(__FILE__)."/../Capa_Controladores/paciente.php");
				include(dirname(__FILE__)."/../Capa_Controladores/persona.php");
				include(dirname(__FILE__)."/../Capa_Controladores/direccion.php");
				include(dirname(__FILE__)."/../Capa_Controladores/comuna.php");
				include(dirname(__FILE__)."/../Capa_Controladores/provincia.php");
				include(dirname(__FILE__)."/../Capa_Controladores/region.php");
				include(dirname(__FILE__)."/../Capa_Controladores/etnia.php");
				include(dirname(__FILE__)."/../Capa_Controladores/prevision.php");
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
				print_r($paciente1);
				$alergias = Paciente::R_AlergiaPaciente(5);
				print_r($alergias);
				$paciente = array_merge($paciente1, $paciente2, $direccion);
				
				
				
				
				 // fin de la consulta llevar a ajax
				 
			/*****************************funcion que corta el string del nombre */
			
			$pos = strpos($medico['Nombre']," ");
			$largo=strlen($medico['Nombre']);
			$corte=$largo - $pos+1;
			$medico['Nombre'] = substr($medico['Nombre'], 0, $corte);
?>

        
<script>
    $(function() {
		
        var Alergias = [ <?php
		foreach ($alergias1 as $dato)
		{
			echo'"'; echo $dato; echo'"'; echo",";
		}
		?>
        ];
		var Condiciones = [
		<?php foreach ($condiciones1 as $dato)
		{
			echo'"'; echo $dato; echo'"'; echo",";
		}?>
		];
			var Recetas = [
		<?php foreach ($recetas as $dato)
		{
			echo'"'; echo $dato; echo'"'; echo",";
		}?>
		 ];
        $( "#Condiciones" ).autocomplete({
            source: Condiciones
        });
		 $( "#Recetas" ).autocomplete({
            source: Recetas
        });
		 $( "#Alergias" ).autocomplete({
            source: Alergias
        });
		
    });
    </script>
    
     
        <!-- fin script js externos -->
        
        <!-- styles -->
        
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet">
        <style> 
        /* Estilos de cargando de la barra respectiva*/
        .ui-autocomplete-loading {
        background: white url('../../img/ui-anim_basic_16x16.gif') right center no-repeat;
            }
        </style>
        <style type="text/css">
        
       body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #efefc8;
      }
        
        ul.nav, .nav{
            
             background: whitesmoke;
        }
        .tabbable-fluid{
            
           
        }
        .tab-content{
            
            
        }
        .tab-pane
        {
            
            
            background-color: #fafaf0;
            
        }
        
        
         .modal{
          
           border: 5px solid #efdcc8;
      }
     .modal-header, .modal-footer{
           
           background-color: #efefc8;
      }
      .modal-body{
          background-color: #fafaf0;
          border: 3px solid #efdcc8;
      }
        
        
        
         .modal-body a:link {text-decoration: none;
      color:white}
.modal-body a:visited {text-decoration: none;
color:white}
.modal-body a:active {text-decoration: none;
color:white}
        
    </style><!-- fin estilo de la pagina -->
  
    
    
    </head>
    <body>
        
        <div class="container-fluid"><!-- contenedor general -->
            
            <div class="row-fluid img-rounded" style="background-color: #fafaf0"> <!--div superior-->
                <div class="span3 img-rounded" style="background-color: #efdcc8">
                    <img class="img-rounded pull-left" src="../../../imgs/dr-house.jpg" style="width: 140px; height: 140px;">
                    <blockquote>
                    <strong>Informacion Medico:<br></strong> 
                   <?php echo "Dr.<br> ".$medico['Nombre']." ".$medico['Apellido_Paterno'];?>
                    </blockquote>
                </div>
                
                <div class="img-rounded span6" style=" background-color:#efdcc8">
                    <center><h2><?php 
					$institucion=$_SESSION['institucionLog']; 
					echo $institucion[1];					
					 ?></h2></center>
                </div>
                
                <div class="span3 pull-right img-rounded" style=" background-color: #efdcc8">
                    <img class="img-rounded pull-right" src="../../../imgs/sabina.jpg"  style="width: 140px; height: 140px;">
                    <blockquote>
                     <script type="text/javascript">
                //validacion del rut ingresado
                function verificarRut( Objeto )
                {
                    var tmpstr = "";
                     $('#mensaje').html("");
                    var intlargo = Objeto.value
                    if (intlargo.length> 0)
                    {
                        crut = Objeto.value
                        largo = crut.length;
                        for ( i=0; i <crut.length ; i++ )
                        if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
                        {
                            tmpstr = tmpstr + crut.charAt(i);
                        }
                        rut = tmpstr;
                        crut=tmpstr;
                        largo = crut.length;
	
                        if ( largo> 2 )
                            rut = crut.substring(0, largo - 1);
                        else
                            rut = crut.charAt(0);
	
                        dv = crut.charAt(largo-1);
	
                        if ( rut == null || dv == null )
                            return 0;
	
                        var dvr = '0';
                        suma = 0;
                        mul  = 2;
	
                        for (i= rut.length-1 ; i>= 0; i--)
                        {
                            suma = suma + rut.charAt(i) * mul;
                            if (mul == 7)
                                mul = 2;
                            else
                                mul++;
                        }
	
                        res = suma % 11;
                        if (res==1)
                            dvr = 'k';
                        else if (res==0)
                            dvr = '0';
                        else
                        {
                            dvi = 11-res;
                            dvr = dvi + "";
                        }
                        if ( dvr != dv.toLowerCase() )
                        {
                            $('#mensaje').html("<span style='color: red'>El rut ingresado no es válido</span>");
                            Objeto.focus();
                            return false;
                        }
                        //alert('El Rut Ingresado es Correcto!')
                        return true;
                    }
                }                       
                $("usuario").validator();
		
		
		    
            </script>
                    <strong>Paciente:<br></strong><table>
                    <tr><td><?php 
					if($paciente['Sexo']=="1")
					{
					echo " Sr.<br>".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ";	
					}
					else
					{
						echo " Sra.<br>".$paciente['Nombre']." ".$paciente['Apellido_Paterno']."";
					}
				echo '</td></tr><tr><td>';
                                       $cadena=$_SESSION['RUTPaciente'];
                  include("Medico/AtencionPaciente/recomponerRUT.php");
                     echo $resultado; ?></td></tr></table>

                    </blockquote>
                </div>
            </div><!-- cierre div superior-->
            
            <div class="tabbable-fluid"><!-- div contenido --> 
                
                <ul class="nav nav-tabs img-rounded"><!-- barra de navegacion -->
                    <li class="active img-rounded"><a href="#tabHistorial" data-toggle="tab">Historial</a></li>
                    <li><a href="#tabConsulta" data-toggle="tab">Consulta</a></li>
                    <li class="dropdown img-rounded">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Opciones <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- links -->
                            <li><a href="#">Favoritos</a></li>
                            <li><a href="#">Imprimir Receta</a></li>
                        </ul>
                    </li>
                    <li class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Volver <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- links -->
                        <li><a href="../doctorIndex.php">Volver al menu</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul><!-- aquí termina lo que hay en la barra navegacion-->
