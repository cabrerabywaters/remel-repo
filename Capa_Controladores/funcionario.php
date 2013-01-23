<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Funcionario {

    static $nombreTabla = "Funcionarios";
    static $nombreIdTabla = "idFuncionario";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Telefono',$_POST['telefono_funcionario']),
                                array('Persona_RUN',$_POST('persona_run')),
                                array('Categoria_Funcionario_idCategoria_Funcionario',$_POST['idCategoria_Funcionario']),
                                array('Fecha_creacion_REMEL','NOW()'),
                                array('Fecha_ultima_edicion','NOW()')
                                      );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id = $_POST['id'];
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $this->_id);
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
                                        'Telefono',
                                        'Persona_RUN',
                                        'Categoria_Funcionario_idCategoria_Funcionario',
                                        'Fecha_creacion_REMEL',
                                        'Fecha_ultima_edicion'
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
    	$id = $_POST['id_condiciones'];
    	$datosActualizacion = array(
                                array('Telefono',$_POST['telefono_funcionario']),
                                array('Categoria_Funcionario_idCategoria_Funcionario',$_POST['idCategoria_Funcionario']),
                                array('Fecha_ultima_edicion','NOW()')
                                	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function EncontrarFuncionario($rut){
        $queryString = "SELECT idFuncionario FROM Funcionarios WHERE Persona_RUN = ".$rut.";";
        $res = CallQuery($queryString);
        if ($res->num_rows == 1) {
            return $res->fetch_row();
        }
        else
            return false;
    }
}

?>