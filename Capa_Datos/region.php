<?php



 /**
 * 
 * Clase que recibe datos de la tabla  
 *
 * @author Ignacio Cabrera
 */
require_once 'interfazDatos.php';

class Region {
    const nombreTabla = "Regiones";
    const nombreIdTabla = "idRegion";

    //Array de datos y string (o array, si es necesario) de IDs.
    private $_datos;
    private $_id;
    
    /**
    * Constructor
    * @param string $id Id de la instancia de la entidad que esta siendo referenciada
    **/
    public function Region($id){
       	// Se apuntan las variables a los constructores de la clase
    	$this->_id=$id;
    }
      
    /**
    * Metodo estatico para agregar funciones a la tabla
    * @param array $datos Vienen del controlador
    **/      
    public static function Agregar($datos){
    	$queryString = QueryStringAgregar($datos,nombreTabla);
    	$query = CallQuery($queryString);
    }

    /**
    * Metodo para agregar funciones a la tabla
    **/
    public function BorrarPorId(){
	$queryString = QueryStringBorrarPorId(nombreTabla,nombreIdTabla,$_id);
	$query = CallQuery($queryString);
    }        
    
    /**
    * Metodo para agregar funciones a la tabla
    * @param array $datos Vienen del controlador
    **/
    public function Actualizar($datos){
	$where = "WHERE";
	$queryString = QueryStringActualizar($where,$datos,nombreTabla);
	$query = CallQuery($queryString;
    }
    
    /**
    * Metodo para agregar funciones a la tabla
    * @param array $atributosASeleccionar Vienen del controlador
    * @param array $where Frase Where que es indicada por el controlador
    **/
    public function Seleccionar($atributosASeleccionar,$where){
	$queryString = QueryStringSeleccionar($where,$atributosASeleccionar,nombreTabla);
	$query = CallQuery($queryString);
	//TODO: Falta el proceso de llenado de populado del objeto
    }
}


?>