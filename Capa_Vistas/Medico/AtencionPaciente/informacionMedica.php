    <div class="accordion-heading">
      <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Información Médica Registrada
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">



  	<div class="row-fluid">
 		 <div class="span6" id="alergias">
 			 <center>
 				 <table class="table table-hover">
  				 <thead>
                     <tr>
                     <th colspan="2">Alergias</th>                      
                    </tr>
                </thead>
   <tbody>';
  <?php  foreach ($alergias as $datos => $dato)
   
   {
	echo "<tr>";
	echo "<td>".$dato['Alergia']." </td>";
	
	
	echo "</tr>";   
	   
   }
		?>	   
			   
			   
 </tbody>
 <tfoot>
 		<tr><td> 
			<form class="form-search" id="buscar_alergia" method="post">
			<div class="input-append">
  				<input id="Alergias" type="text">
 				 <button class="btn" type="button" id="boton_alergia">Añadir</button>
  			</div>
			</form>
  		</td></tr>
</tfoot>
</table>
</center></div>
<div class="span6" id="condiciones"> <center>
  <table class="table table-hover">
   <thead>
                     <tr>
                     <th>Condiciones</th>                      
                    </tr>
                </thead>
                <tbody>

  <?php foreach ($condiciones as $datos => $dato)
   {
	echo '<tr id="'.$dato['idCondiciones'].'">';
	echo "<td>".$dato['Nombre']." </td>";
	echo "</tr>";   
	   
   } ?>
                </tbody>
<tfoot><tr><td> 
			<form class="form-search" method="post">
			<div class="input-append">
  				<input id="Condiciones" type="text">
  				<button class="btn" type="button" id="boton_condiciones" disabled="disabled">Añadir</button></div>
				</form></td></tr>	
				</tfoot></table></center>
		  </div> 
  		</div>
      </div>
    </div>
<script>
$( "#Condiciones" ).autocomplete({
                                /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                          source: function( request, response ){
                                	 
								$.ajax({
                                    url: "../../../ajax/autocompleteCondiciones.php",
                                    data: {
                                        name_startsWith: request.term,
    										                                
									},
									
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data); 
										              
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre
                                              ,id3 : item.idCondiciones
                                            }
                                        })//end map
                                        );  // end response
                                    }//end success

                                });//end ajax 
							}, // end source
                           select: function(event, ui){
                            var idCondicion = ui.item.id3
							$("#boton_condiciones").removeAttr('disabled');
							$('#Condiciones').removeAttr('idCondicion').attr('idCondicion',idCondicion)
							//        
                            //      var nombreCondicion = ui.item.label
							//		$('#boton_condiciones').removeAttr('disabled');
							//		$.ajax({
							//			url: "../../../ajax/agregarCondicion.php",
							//			data: {"idCondicion":idCondicion},
							//			type: "post",
							//			success: function(output){
							//				if(output=="1"){
							//			//aqui se agrega al listado
									//	$('#condiciones tbody').append('<tr><td idCondicion="'+idCondicion+'">'+nombreCondicion+'</td></tr>')
								//			}
								//		}
                             //   });
							},
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
		                        });
								

							//autocompleteDiagnosticos
$("#boton_condiciones").click(function(){
var idCondicion = $("#Condiciones")

	
})							
$( "#Alergias" ).autocomplete({
                                /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                          source: function( request, response ){
                                $.ajax({
                                    url: "../../../ajax/autocompleteAlergias.php",
                                    data: {
                                        name_startsWith: request.term
                                    },
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data);
                                                                                
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre
                                              ,id3 : item.idAlergias
                                            }
                                            
                                        })//end map
                                        );  // end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           select: function(event, ui){
                                    $('#Alergias').removeAttr('idAlergia').attr('idAlergia',ui.item.id3)
                                    $('#guardar_alergia').removeAttr('disabled');
                                    $('#boton_alergia').removeAttr('disabled');
                                },
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
                            });//autocompleteDiagnosticos
</script>
