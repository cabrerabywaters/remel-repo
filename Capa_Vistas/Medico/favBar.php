<!-- barra de favoritos -->
    <div class="row-fluid show-grid img-rounded" id="favBar" style="background-color: #B0BED9">
        <button class="btn btn-block" disabled>
             <i class="icon-star"></i> Mis Favoritos
          <a href="#" class="closeBar"><i class="icon-remove pull-right"></i></a>
      </button>
      
      <!-- diagnosticos Favoritos -->
      <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#diagnosticosFav">
           <i class="icon-circle-arrow-down icon-white" rel="tooltip" title="Ocultar"></i> Diagnosticos
      </button>
      
      <div id="diagnosticosFav" class="collapse">
          <div class="span10 offset1">
              
          <div class="alert alert-info"><!-- pill diagnosticoFav 1 -->
              <strong>Diagnostico ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i></a><!-- eliminar de favoritos --> 
              <a href="#gregarFav" rel="tooltip" title="Agregar a Receta"> <i class="detalleDiagnostico icon-plus pull-right"></i></a><!-- agregar favorito seleccionado -->
          </div><!-- end pill diagnosticoFav 1-->
          <div class="alert alert-info"><!-- pill diagnosticoFav 1 -->
              <strong>Diagnostico ej</strong>
              <a href="#borrarFav" rel="tooltip" title="Eliminar de Favoritos"> <i class="icon-remove pull-right"></i></a><!-- eliminar de favoritos --> 
              <a href="#gregarFav" rel="tooltip" title="Agregar de Receta"> <i class="detalleDiagnostico icon-plus pull-right"></i></a><!-- agregar favorito seleccionado -->
          </div><!-- end pill diagnosticoFav 1-->
          
          </div>
      </div>
      <!-- fin diagnosticos favoritos-->
      
      <!-- medicamentos favoritos -->
      <button type="button" class="btn btn-success btn-block" data-toggle="collapse" data-target="#medicamentosFav">
          <i class="icon-circle-arrow-down icon-white" rel="tooltip" title="Ocultar"></i> Medicamentos Favoritos
      </button>
      
      <div id="medicamentosFav" class="collapse">
       <div class="span10 offset1">
           <?php
		//session_start();
		include_once(dirname(__FILE__)."/../../Capa_Datos/llamarQuery.php");
		$idMedico = $_SESSION['idMedicoLog'];
		$queryString = "SELECT Nombre_corto, Favoritos_RP.ID, Nombre_Comercial, idMedicamento, Laboratorios.Nombre
                FROM Laboratorios, Medicamentos, Favoritos_RP
                WHERE Medicamentos_idMedicamento = idMedicamento
                AND Laboratorio_idLaboratorio = Laboratorios.ID
                AND Medicos_idMedico = '$idMedico' GROUP BY idMedicamento";
		$res = CallQuery($queryString);
                while($row = $res->fetch_assoc()){
                        $nombre = $row['Nombre_Comercial'] . "-" . $row['Nombre'];
                        $idFav = $row['idMedicamento'];
                        $nombreCorto = $row['Nombre_Corto'];
                        echo "<div class='alert alert-warning' identificador='$idFav'>\r\n";
			echo "<div class='btn-group pull-right'>
                                <a class='btn btn-mini btn-success dropdown-toggle' data-toggle='dropdown' href='#'>
                                    Añadir <i class='icon-star'></i>
                                <span class='caret'></span>
                                </a>
                                <ul class='dropdown-menu'>
                                <!-- nombres cortos	-->
                                <li>".$nombreCorto."</li>
                                </ul>
                                </div>";
			echo "<strong><small>$nombre</small></strong>\r\n</div>\r\n";
		}
      ?> 
       </div>
      </div>
      <!-- fin medicamentos favoritos -->
</div><!-- fin de la barra de favoritos -->

<script>
   /**
    * comportamiento de los paneles colapsables (que cambien los iconos segun corresponda)
    * de favoritos
    * @author: Cesar González
    */ 
   
   $('#diagnosticosFav').on('hide',function(){
       $('button[data-target="#diagnosticosFav"] i')
            .removeClass("icon-circle-arrow-up")
            .addClass("icon-circle-arrow-down")
            .attr('title','Mostrar')
            ;})
   $('#diagnosticosFav').on('show',function(){
       $('button[data-target="#diagnosticosFav"] i')
            .removeClass("icon-circle-arrow-down")
            .addClass("icon-circle-arrow-up")
            .attr('title','Ocultar')
            ;})
   $('#medicamentosFav').on('hide',function(){
       $('button[data-target="#medicamentosFav"] i')
            .removeClass("icon-circle-arrow-up")
            .addClass("icon-circle-arrow-down")
            .attr('title','Mostrar')
            ;})
   $('#medicamentosFav').on('show',function(){
       $('button[data-target="#medicamentosFav"] i')
            .removeClass("icon-circle-arrow-down")
            .addClass("icon-circle-arrow-up")
            .attr('title','Ocultar')
            ;})
   $('#medicamentosRpFav').on('hide',function(){
       $('button[data-target="#medicamentosRpFav"] i')
            .removeClass("icon-circle-arrow-up")
            .addClass("icon-circle-arrow-down")
            .attr('title','Mostrar')
            ;})
   $('#medicamentosRpFav').on('show',function(){
       $('button[data-target="#medicamentosRpFav"] i')
            .removeClass("icon-circle-arrow-down")
            .addClass("icon-circle-arrow-up")
            .attr('title','Ocultar')
            ;})
     
 
</script>

<script>
$('a[href="#borrarFav"]').unbind('click').on('click',function() {
    var idFavoritoRP = $(this).parent().attr('idFavorito');
    $('a[href="#borrarFav"]').remove();
    alert('¿Seguro que desea eliminar este favorito?')
    $.ajax({
    url: "../../ajax/borrarFavorito.php", 
              type: "POST",
              data: {idFavoritoRP:idFavorito},
              success: function(output){
                  alert('Favorito eliminado correctamente!');
                  if(output == 1){// se eliminó correctamente de favoritos
                      $(this).parent('span').remove(); // se elimina el div donde está contenido el elemento
                        
                  }
              }//end success
              
                
            });//end ajax
        }); // click
        
       
        
        
        
$('a[href="#borrarFav"]').unbind('click').on('click',function() {
    var idFavoritoRP = $(this).parent().attr('idFavorito');
    $('a[href="#borrarFav"]').remove();
    alert('¿Seguro que desea eliminar este favorito?')
    $.ajax({
    url: "../../ajax/borrarFavorito.php", 
              type: "POST",
              data: {idFavoritoRP:idFavorito},
              success: function(output){
                  alert('Favorito eliminado correctamente!');
                  if(output == 1){// se eliminó correctamente de favoritos
                      $(this).parent('span').remove(); // se elimina el div donde está contenido el elemento
                        
                  }
              }//end success
              
                
            });//end ajax
        }); // click
        
        $('idFavoritoRP').remove();
        

</script>
