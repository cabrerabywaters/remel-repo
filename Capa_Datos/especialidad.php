<?php

/**
 * 
 * Clase que recibe datos de la tabla  
 *
 * @author todos
 */
require_once 'interfazDatos.php';

class Especialidad {

    static $nombreTabla = "Especialidades";
    const nombreIdTabla = "idEspecialidad";

    //Array de datos y string (o array, si es necesario) de IDs.
    private $_datos;
    private $_id;

    /**
     * Constructor
     * @param string $id Id de la instancia de la entidad que esta siendo referenciada
     * */
    public function Especialidad($id) {
        // Se apuntan las variables a los constructores de la clase
        $this->_id = $id;
    }

    /**
     * Metodo estatico para agregar funciones a la tabla
     * @param array $datos Vienen del controlador
     * */
    public static function Agregar($datos) {
        $queryString = QueryStringAgregar($datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * Metodo para agregar funciones a la tabla
     * */
    public function BorrarPorId() {
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, nombreIdTabla, $_id);
        $query = CallQuery($queryString);
    }

    /**
     * Metodo para agregar funciones a la tabla
     * @param array $datos Vienen del controlador
     * */
    public function Actualizar($datos) {
        $where = "WHERE " . nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datos, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * Metodo para agregar funciones a la tabla
     * @param array $atributosASeleccionar Vienen del controlador
     * @param array $where Frase Where que es indicada por el controlador
     * */
    public static function Seleccionar($atributosASeleccionar, $where) {
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);
        $query = CallQuery($queryString);
        //TODO: Falta el proceso de llenado de populado del objeto
    }
}

?>