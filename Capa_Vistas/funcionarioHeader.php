<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/*
 * muestra los datos del funcionario (foto, nombre y cargo) y la barra de navegacion
 * input: informacionFuncionario.php
 * output: muestra la info
 */
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
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
                        <!-- estilo de la pagina -->
                          <style type="text/css">
        
    body {
        padding-top: 0px;
        padding-bottom: 40px;
       background: rgb(255,255,255); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(229,229,229,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(229,229,229,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 ); /* IE6-9 */

    }
    .dropdown-menu{
        z-index: 1040;
    }
    .dropdown{
        z-index: 1040;
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
            background-color: white;}
        
        
    .modal{
           border: 5px solid #0b72b5;
            max-height: 600px;
      }
      
       .modal2{
           border: 5px solid #0b72b5;
           
      }
    .modal-header, .modal-footer{
          background-color: whitesmoke;
      }
    .modal-body{
          background-color: white;
          border: 3px solid #0b72b5;
         
          overflow-y: scroll;
      }
        
    .modal-body a:link {text-decoration: none;
      color:white}
    .modal-body a:visited {text-decoration: none;
      color:white}
    .modal-body a:active {text-decoration: none;
      color:white}
    
    #navegador a{
        
      color: white;
      
 background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */

   
    }
     #navegador a:hover{
        
         background: #414040;
      
         
    }
    #navegador a{
   
        border-color: white;
        border-style: solid;
    }
    input{text-transform:uppercase;}
   
</style><!-- fin estilo de la pagina -->

                        <!-- scripts js externos -->       
                        <script src="http://code.jquery.com/jquery-latest.js"></script>
                        <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
                        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
                        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
                        <script type="text/javascript" src="https://www.google.com/jsapi"></script>

                        <?php
                        // donde estan ubicadas las variables que se despliegan en la base del proyecto
                        include(dirname(__FILE__) . "/informacionFuncionario.php");
                        ?>
                        <!-- scripts de google con php -->
                        </head>


                        <!--de aqui en adelante es pura prueba-->

                        <div class="container-fluid"><!-- contenedor general -->

                            <div class="row-fluid img-rounded" style="background-image: linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -o-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -moz-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -webkit-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -ms-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.94, rgb(28,117,189)),
	color-stop(0.74, rgb(28,117,189)),
	color-stop(0.87, rgb(28,117,189))
);
"> <!--div superior-->
                                <div class="span3 img-rounded" style="background-image: linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -o-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -moz-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -webkit-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);
background-image: -ms-linear-gradient(bottom, rgb(28,117,189) 94%, rgb(28,117,189) 74%, rgb(28,117,189) 87%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.94, rgb(28,117,189)),
	color-stop(0.74, rgb(28,117,189)),
	color-stop(0.87, rgb(28,117,189))
);
"><!-- despliega la foto del paciente -->
                                    <img class="img-rounded pull-left" src="<?php echo $funcionario['Foto']; ?>" style="width: 180px; height: 180px;">
                                </div><!-- cierre del despliege de la foto -->

                                <div class="img-rounded span6" style=" background-color:white"><!-- despliega el nombre del usuario -->
                                    <center><h2><?php echo $funcionario['Nombre'] . " " . $funcionario['Apellido_Paterno'] . " " . $funcionario['Apellido_Materno'];
                                                      echo '</br>';
                                                      echo $nombreCategoria;
                                                ?>
                                        </h2>
                                    </center>
                                </div><!-- cierre despliege del nombre del usuario -->
                            </div><!-- cierre div superior -->

                            <!-- stilos de diseño de la bara de navegacion y la pagina -->
                            <ul class="nav nav-tabs img-rounded" style="background: rgb(242,245,246); /* Old browsers */
                                background: -moz-linear-gradient(45deg,  rgba(242,245,246,1) 0%, rgba(227,234,237,1) 37%, rgba(200,215,220,1) 100%); /* FF3.6+ */
                                background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(242,245,246,1)), color-stop(37%,rgba(227,234,237,1)), color-stop(100%,rgba(200,215,220,1))); /* Chrome,Safari4+ */
                                background: -webkit-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Chrome10+,Safari5.1+ */
                                background: -o-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Opera 11.10+ */
                                background: -ms-linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* IE10+ */
                                background: linear-gradient(45deg,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* W3C */
                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f5f6', endColorstr='#c8d7dc',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
                                "><!-- barra de navegacion -->
                                <!-- Acá se redirige a distintos tabs colapsables, de los cuales solo historial está listo 
                                                         Los href hacen referencia a los tabs en paginaPaciente.php -->
                                <li class="active img-rounded"><a href="#tabVenderMedicamentos" data-toggle="tab">Vender Medicamentos</a></li>
                                <li><a href="#tabVerArsenal" data-toggle="tab">Ver Arsenal</a></li>
                                
				<li class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Volver <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- links -->
                        <li><a href="../decision.php">Volver al Menú</a></li>
                        <li><a href="../Medico/logout.php">Salir</a></li>
                        </ul>
                    </li> 

                                        </ul>






