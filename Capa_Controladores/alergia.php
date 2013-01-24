<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Alergia {

    static $nombreTabla = "Alergias";
    static $nombreIdTabla = "idAlergia";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
            array('Nombre',$_POST['nombre']),
			array('Sintomas',$_POST['sintomas']),
			array('Tipo_idTipo',$_POST['tipo_idtipo'])
            );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId($id) {
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $id);
        $query = CallQuery($queryString);
    }
    
    /**
     * Seleccionar
     * 
     * Esta funcion selecciona todas las entradas de una tabla
     * con respecto a una condicion dada. Tambien es posible
     * entregar un limite y un offset.
     * 
     * @param string $where
     * @param int $limit
     * @param int $offset
     * @returns array $resultArray
     */
    public static function Seleccionar($where, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
										'Nombre',
										'Sintomas',
										'Tipo_idTipo'
      );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

	    if($limit != 0){
	       $queryString = $queryString." LIMIT $limit";
	    }
	    if($offset != 0){
		  $queryString = $queryString." OFFSET $offset ";
	    }

        $result = CallQuery($queryString);
	    $resultArray = array();
	    while($fila = $result->fetch_assoc()) {
	       $resultArray[] = $fila;
	    }
	    return $resultArray;
    }
    
    /**
     * Actualizar
     * 
     * Esta funcion toma una id de una entrada existente
     * y actualiza con datos nuevos, la id y los datos vienen
     * por POST desde AJAX
     */
    public static function Actualizar() {
    	$id = $_POST['id'];
    	$datosActualizacion = array(
                            	array('Nombre', $_POST['nombre']),
							 	array('Sintomas',$_POST['sintomas']),
								array('Tipo_idTipo',$_POST['tipo_idtipo'])
            );
        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function BuscarAlergiaLike($Nombre,$id) {

      		        $queryString = "SELECT Nombre,idAlergia
									 
									FROM Alergias

									WHERE Nombre LIKE '%".$Nombre."%'
									
								    AND idAlergia NOT IN (SELECT idAlergia

                     				FROM Alergias, Alergia_has_Paciente, Pacientes

                       				WHERE Pacientes.idPaciente= ".$id."
									 
									AND Pacientes.idPaciente=Alergia_has_Paciente.Paciente_idPaciente
									 
									AND Alergia_has_Paciente.Alergia_idAlergia=Alergias.idAlergia)

                       				ORDER BY  Alergias.Nombre ASC 
									
									LIMIT 5";
									
        $result = CallQuery($queryString);
	    $resultArray = array();
	    while($fila = $result->fetch_assoc()) {
	       $resultArray[] = $fila;
	    }
	    return $resultArray;
   }	     
 
   public static function BuscarNombreAlergiaPorId($idAlergia){
       $queryString = 'SELECT Nombre as Text FROM Alergias WHERE idAlergia = ' . $idAlergia . ';';
       $result = CallQuery($queryString);
       return $result;
   }
}

?>
