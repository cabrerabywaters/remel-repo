    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Información Médica Registrada
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
<?php 
function mostrarAlergias($alergias){ 
    echo'
  <div class="row">
  <div class="span5" id="alergias">
  <table>
   <thead>
                     <tr>
                     <th>Alergias</th>                      
                    </tr>
                </thead>
                <tr><td>
   <table class="table table-hover">';
               
               foreach ($alergias as $datos => $dato)
				{
				echo"	<tr>";
					$contador=1;
					foreach($dato as $valor)
					{
						$contador++;
						
					}
					
					echo"<td rowspan='".$contador."'>
					$datos</td></tr>";
					
					foreach($dato as $valor)
					{
						$contador++;
						echo "<tr><td>$valor</td></tr>";
						
					}
					echo"</tr>";
				} 
				echo' </tbody>
            </table>
            </tr></td><tfoot><tr><td> 
			<form class="form-search">
			<div class="input-append">
  				<input class="span2" id="Alergias" type="text">
 				 <button class="btn" type="button">Search</button>
  			</div>
			</form>
  </td></tr></tfoot></table></div>';
}
  
function mostrarCondiciones($condiciones){  
    echo'<div class="span5 offset2">
  <table>
   <thead>
                     <tr>
                     <th>Condiciones</th>                      
                    </tr>
                </thead>
                <tr><td>
   <table class="table table-hover">';
               
              foreach ($condiciones as $datos => $dato)
				{
				echo"	<tr>";
					$contador=1;
					foreach($dato as $valor)
					{
						$contador++;
						
					}
					
					echo"<td rowspan='".$contador."'>
					$datos</td></tr>";
					
					foreach($dato as $valor)
					{
						$contador++;
						echo "<tr><td>$valor</td></tr>";
						
					}
					echo"</tr>";
				}
echo'
                </tbody>
            </table>
            </tr></td><tfoot><tr><td> 
			<form class="form-search">
			<div class="input-append">
  				<input class="span2" id="Condiciones" type="text">
  				<button class="btn" type="button">Search</button></div>
				</form></td></tr>	
				</tfoot></table>
			</div> 
  </div>';
  } 

          mostrarAlergias($alergias);
          mostrarCondiciones($condiciones); ?>
      </div>
    </div>
