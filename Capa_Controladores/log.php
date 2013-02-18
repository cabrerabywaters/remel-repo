<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Log {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Log";
        /**
     * Nombre del id de tabla
     * @static  
     * @var string
     */
    static $nombreIdTabla = "ID";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Fecha', $_POST['fecha']),
            array('campoModificado', $_POST['campoModificado']),
            array('valorAnterior', $_POST['valorAnterior']),
            array('valorNuevo', $_POST['valorNuevo']),
            array('NombreTabla', $_POST['NombreTabla']),
            array('Personas_RUN', $_POST['Personas_RUN']),
            array('Medicos_idMedico', $_POST['Medicos_idMedico']),
            array('Medicos_Personas_RUN', $_POST['Medicos_Personas_RUN']),
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
    public static function Seleccionar($where, $limit = 0, $offset = 0, $orderBy = 'Fecha DESC') {
        $atributosASeleccionar = array(
            'Fecha',
            'campoModificado',
            'valorAnterior',
            'valorNuevo',
            'NombreTabla',
            'Personas_RUN',
            'Medicos_idMedico'
        );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);
        
        $queryString = $queryString . " ORDER BY $orderBy";
        if ($limit != 0) {
            $queryString = $queryString . " LIMIT $limit";
        }
        if ($offset != 0) {
            $queryString = $queryString . " OFFSET $offset ";
        }
        
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
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
        $id = $_POST['rut'];
        $datosActualizacion = array(
            array('Fecha', $_POST['fecha']),
            array('campoModificado', $_POST['campoModificado']),
            array('valorAnterior', $_POST['valorAnterior']),
            array('valorNuevo', $_POST['valorNuevo']),
            array('NombreTabla', $_POST['NombreTabla']),
            array('Personas_RUN', $_POST['Personas_RUN']),
            array('Medicos_idMedico', $_POST['Medicos_idMedico']),
            array('Medicos_Personas_RUN', $_POST['Medicos_Personas_RUN']),
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //inserta en log un cambio hecho por un medico
        /*
     * Inserta un Log por el medico
     * @static
     * @access public
     * @param string $fecha fecha
     * @param string $campo campo cambiado
     * @param string $valorAnterior valor anterior
     * @param string $valorNuevo valor nuevo
     * @param string $nombreTabla nombre de la tabla donde esta el atributo
     * @param int $run run del paciente
     * @param int $idMedico ID del medico
     * @return nothing
     */
    public static function InsertarModificacionDatosPaciente($fecha, $campo, $valorAnterior, $valorNuevo, $nombreTabla, $run, $idMedico) {
        $queryString = 'INSERT  INTO Log (Fecha, campoModificado, valorAnterior, valorNuevo, NombreTabla, Personas_RUN, Medicos_idMedico)
                                VALUES ("' . $fecha . '", "' . $campo . '","' . $valorAnterior . '", "' . $valorNuevo . '","' . $nombreTabla . '", "' . $run . '", "' . $idMedico . '")  
                                ';
        $query = CallQuery($queryString);
    }
    //inserta en log un cambio hecho por un paciente a si mismo
            /*
     * Inserta un Log por el mismo paciente
     * @static
     * @access public
     * @param string $fecha fecha
     * @param string $campo campo cambiado
     * @param string $valorAnterior valor anterior
     * @param string $valorNuevo valor nuevo
     * @param string $nombreTabla nombre de la tabla donde esta el atributo
     * @param int $run run del paciente
     * @return nothing
     */
    public static function InsertarModificacionDatosPacientePropia($fecha, $campo, $valorAnterior, $valorNuevo, $nombreTabla, $run) {
        $queryString = 'INSERT  INTO Log (Fecha, campoModificado, valorAnterior, valorNuevo, NombreTabla, Personas_RUN, Medicos_idMedico)
                                VALUES ("' . $fecha . '", "' . $campo . '","' . $valorAnterior . '", "' . $valorNuevo . '","' . $nombreTabla . '", "' . $run . '", "")  
                                ';
        $query = CallQuery($queryString);
    }

}

?>