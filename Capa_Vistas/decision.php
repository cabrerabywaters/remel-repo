<!DOCTYPE html>
<?php
include '../ajax/sessionCheck.php';
include_once(dirname(__FILE__) . '/../Capa_Controladores/sucursalesHasFuncionarios.php');
include_once(dirname(__FILE__) . '/../Capa_Controladores/funcionario.php');

iniciarCookie();
verificarIP();
print_r($_SESSION);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ingresar-Remel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: white;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fafaf0;
                border: 3px solid #efdcc8;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;

            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }

        </style>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" rel="text/javascript"></script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
        <script>
            /**
             * funcion que al hacer click en el boton del acordeon cambia el icono
             * de la flecha
             */
            $(document).ready(function(){
                $('button[data-toggle="collapse"]').click(function(){
                    if($('button[data-toggle="collapse"] i').hasClass('icon-chevron-down icon-white'))
                    {
                        $('button[data-toggle="collapse"] i').removeClass();
                        $('button[data-toggle="collapse"] i').addClass('icon-chevron-up icon-white');}
                    else{
                        $('button[data-toggle="collapse"] i').removeClass();
                        $('button[data-toggle="collapse"] i').addClass('icon-chevron-down icon-white');}
            
                }); //end click
            }); // end ready
    
        </script>  
    </head>

    <body>

        <div class="container-fluid">

            <form class="form-signin" >
                <h2 class="form-signin-heading"><center>Ingresar</center>   </h2>
                <h5 class="form-signin-heading"><center>Seleccione como desea ingresar</center>   </h5>

                <button type="button" class="btn btn-block btn-large" data-toggle="collapse" data-target="#demo"><i class="icon-chevron-down icon-white"></i> Ingresar como Médico</button>
                <div id="demo" class="collapse" data-parent="#ingresoMedico">
                <div id="contenedor_lugares">    
<?php
/**
 * genero el listado de las instituciones desde el arreglo
 * de sesion instituciones (contiene todas las instituciones de 
 * el medico conectado
 */


if (isset($_SESSION['lugares']) == "true") {
$sucursales = $_SESSION['lugares'];

foreach($sucursales as $sucursal){
    echo "<div idSucursal='".$sucursal['RUT']."' nombreSucursal='".$sucursal['Nombre']."' class='alert alert-success'><strong>".$sucursal['Nombre']."</strong>";
    foreach($sucursal['Lugares'] as $lugar){
        echo "<button class='btn btn-block lugar' type='button' idLugar='".$lugar['idLugar_de_Atencion']."'>".$lugar['Nombre']."</button>";
    }
    echo "</div>";
}
}//end if
?>
                </div>
                    <script>
                        /**
                         * script que envía el valor de la institucion seleccionada
                         * al archivo institucionesLog.php para ser guardado en la 
                         * $_SESSION['institucionLog']
                         */
                            $("#contenedor_lugares .lugar").click(function(){
                                var postData = { //JSON con la info de la institucion que se envia
                                    'idLugar': $(this).attr('idLugar'),
                                    'nombreLugar': $(this).html(),
                                    'rutSucursal': $(this).parent().attr('idSucursal'),
                                    'nombreSucursal': $(this).parent().attr('nombreSucursal') 
                                };
	        
                                $.ajax({ url: '../ajax/lugarLog.php',
                                    data: postData,
                                    type: 'post',
                                    async: 'false',
                                    success: function(output){                          
                                        /**
                                         * funcion que verifica el output de la consulta
                                         * si es 1 re-dirige a la pagina correspondiente
                                         * si es 0 muestra que la institucion no está bien seleccionada
                                         */
                                        
                                        if(output == '1'){
                                            window.location.href = "Medico/doctorIndex.php";
                                        }
                                        else{
                                            $('#mensaje').html("<span style='color: red'>No se guardó la Institucion en la sesion!</span>");
                                        }
                                    }
                                });//fin ajax
                                
                             
                            });//fin click
                    
            
                    </script>

                </div>
                
                                <button type="button" class="btn btn-block btn-large" data-toggle="collapse" data-target="#funcionario"><i class="icon-chevron-down icon-white"></i> Ingresar como Funcionario</button>
                <div id="funcionario" class="collapse" data-parent="#ingresoFuncionario">
                <div id="contenedor_lugares_funcionario">    
<?php
/**
 * genero el listado de las instituciones desde el arreglo
 * de sesion instituciones (contiene todas las instituciones de 
 * el medico conectado
 */


if (isset($_SESSION['lugaresFuncionario']) == "true") {
$sucursalesFuncionario = $_SESSION['lugaresFuncionario'];

foreach($sucursalesFuncionario as $sucursal){
    echo "<div idSucursal='".$sucursal['RUT']."' nombreSucursal='".$sucursal['Nombre']."Funcionario' class='alert alert-success'><strong>".$sucursal['Nombre']."</strong>";
    foreach($sucursal['Lugares'] as $lugar){
        echo "<button class='btn btn-block lugar' type='button' idLugar='".$lugar['idLugar_de_Atencion']."Funcionario'>".$lugar['Nombre']."</button>";
    }
    echo "</div>";
}
}//end if
?>
                </div>
                </div>
                
                
                
                <button class="btn btn-large btn-block" onClick="redireccionar()" type="button">Ingresar como Paciente</button>

                <div id="mensaje"></div> <!-- div para mostrar mensajes de error -->
            </form>



        </div> <!-- /container -->



    </body>
</html>
<script language="javascript">
    
    function redireccionar(){
        top.location = '/remel-repo/Capa_Vistas/Paciente/paginaPaciente.php';
    }
    
</script>