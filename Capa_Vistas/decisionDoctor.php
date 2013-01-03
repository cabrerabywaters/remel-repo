<!DOCTYPE html>
<?php

include '../sessionCheck.php';

iniciarCookie();
verificarIP();


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
        background-color: #CDD9AE;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #B6DEDB;
        border: 3px solid #DCF1EF;
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

      <form class="form-signin" action="Medico/doctorIndex.php" method="post">
        <h2 class="form-signin-heading"><center>Ingresar</center>   </h2>
        <h5 class="form-signin-heading"><center>Seleccione como desea ingresar</center>   </h5>
        
        <button type="button" class="btn btn-warning btn-block btn-large" data-toggle="collapse" data-target="#demo"><i class="icon-chevron-down icon-white"></i> Ingresar como Médico</button>
            <div id="demo" class="collapse" data-parent="#ingresoMedico">
                <?php
                /**
                 * genero el listado de las instituciones desde el arreglo
                 * de sesion instituciones (contiene todas las instituciones de 
                 * el medico conectado
                 */
                foreach($_SESSION['instituciones'] as $id => $institucion){
                   echo "<button class='btn btn-block' idinstitucion ='$id'>$institucion</button>"; 
                 };
                ?>
                <button class="btn btn-block" type="submit" idinstitucion ="999">Institucion 1</button>
                <button class="btn btn-block" type="submit" idinstitucion ="998">Institucion 2</button>
                <script>
                /**
                 * script que envía el valor de la institucion seleccionada
                 * al archivo institucionLog.php para ser guardado en la 
                 * $_SESSION['institucionLog']
                */
                $(document).ready(function(){
                    $("#demo button").click(function(){
                       var postData = { //JSON con la info de la institucion que se envia
                           'idinstitucion': $(this).attr('idinstitucion'),
                           'nombre': $(this).html()
                       };
                       
			$.ajax({ url: 'ajax/institucionLog.php',
         			data: postData,
         			type: 'post',
         			success: function(output) {
                                    /**
                                     * funcion que verifica el output de la consulta
                                     * si es 1 re-dirige a la pagina correspondiente
                                     * si es 0 muestra que la institucion no está bien seleccionada
                                     */
                				if(output == '1') {
							window.location.href = "Medico/doctorIndex.php";
						}
						else{
							$('#mensaje').html("<span class='alert alert-error'>No se guardó la Institucion en la sesion!</span>");
						}
                  			}
				}); // end ajax
		 
                        
                    });//end click
                    
                }); // end ready
            
                </script>
                <div id="mensaje"></div> <!-- div para mostrar mensajes de error -->
            </div>
        <button class="btn btn-large btn-block" type="button">Ingresar como Paciente</button>
      </form>
        

 
        
    </div> <!-- /container -->



  </body>
</html>
