<?php





/*
 * La clase Clases_Terapeurticas realiza todas las llamadas a la base de datos requeridas para agregar, leer, modificar y eliminar
 * registros de Clases_Terapeurticas.
 *
 * @author Leonardo Hidalgo
 */


  require_once 'Conexion.php';

class Clases_Terapeurticas {
    
    private $id_de_clase_terapeurtica; 
    private $nombre_de_clase_terapeurtica;
    
    
    public function Clases_Terapeurticas()
            {
        
        $this->nombre_clase_terepeurtica=$nombre_clase_terapeurtica;
        $this->id_clase_terapeurtica=$id_clase_terapeurtica;
    }
      
          
    public function Agregar_Clases_Terapeurticas()
     {
        
        $con = new ConexionDB();
     
       $con->conectar();
       
      $nombre_Clases_Terapeurticas = mysql_real_escape_string($this->Nombre);
      $ID_Clases_Terapeurticas= mysql_real_escape_string($this->ID);
      
      
      $query= mysql_query("INSERT INTO clases_terapeurticas(Nombre,idClase_Terapeurtica) VALUES ('$nombre_clase_terapeurtica','$id_clase_terapeurtica')");
      
      if($query)
      {
          
          echo "Clase Terapeurtica $this->nombre_clase_terapeurtica Agregada con exito";
         
      }
      else
      {
          die('Error: ' . mysql_error());
         
          
      }
      $con->desconectar();
    }
    public function Eliminar_Clases_Terapeurticas()
     {
          
        
        $con = new ConexionDB();
     
       $con->conectar();
                  
      $nombre_Clases_Terapeurticas = mysql_real_escape_string($this->Nombre);
      $ID_Clases_Terapeurticas= mysql_real_escape_string($this->ID);
      
      if($ID_Clases_Terapeurticas)
      {
      $query= mysql_query("DELETE FROM clases_terapeurticas 
WHERE clases_terapeurticas.idClase_Terapeurtica = $ID_Clases_Terapeurticas;
");
      }
      else
      {
         $query= mysql_query("DELETE FROM clases_terapeurticas 
WHERE clases_terapeurticas.idClase_Terapeurtica = $nombre_Clases_Terapeurticas;
"); 
      }
      if($query)
      {
          
          echo "Clase Terapeurtica $this->nombre_clase_terapeurtica Eliminada con exito";
         
      }
      else
      {
          die('Error: ' . mysql_error());
         
          
      }
      $con->desconectar();
                  }                  
    public function Actualizar_Clases_Terapeurticas()
     {
          
        
        $con = new ConexionDB();
     
       $con->conectar();
                  
      $nombre_Clases_Terapeurticas = mysql_real_escape_string($this->Nombre);
      $ID_Clases_Terapeurticas= mysql_real_escape_string($this->ID);
      
      $query= mysql_query("UPDATE  clases_terapeurticas 
SET  Nombre =  $nombre_Clases_Terapeurticas 
WHERE  clases_terapeurticas.idClase_Terapeurtica = $ID_Clases_Terapeurticas;
;
");
      
      if($query)
      {
          
          echo "Clase Terapeurtica $this->nombre_clase_terapeurtica Actualizada con exito";
         
      }
      else
      {
          die('Error: ' . mysql_error());
         
          
      }
      
      
      $con->desconectar();
        
      
    }
    public function Seleccionar_Clases_terapeurticas() 
         
            {        
        $con = new ConexionDB(); 
        
       $con->conectar();      
       
      $nombre_Clases_Terapeurticas = mysql_real_escape_string($this->Nombre);
      $ID_Clases_Terapeurticas= mysql_real_escape_string($this->ID);
      
      $query= mysql_query("SELECT idClase_Terapeurtica, Nombre 
          FROM  clases_terapeurticas 
          WHERE  idClase_Terapeurtica = $ID_Clases_Terapeurticas 
              OR  Nombre LIKE  '$nombre_Clases_Terapeurticas'");
      
      
      
      if($query)
      {
          
          echo "Clase Terapeurtica $this->nombre_clase_terapeurtica Seleccionada con exito";
         
      }
      else
      {
          die('Error: ' . mysql_error());
         
          
      }     
      $con->desconectar();      
            }
}


?>