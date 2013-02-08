<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Seguro {

    static $nombreTabla = "Seguros";
    static $nombreIdTabla = "idSeguros";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Nombre', $_POST['nombre']),
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
            'Nombre',
        );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

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
        $id = $_POST['id_condiciones'];
        $datosActualizacion = array(
            array('Nombre', $_POST['nombre']),
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca nombre de seguro segun una fraccion de texto
    public static function BuscarSeguroLike($nombre) {

        $queryString = 'SELECT Seguros.Nombre
                        FROM Seguros
                        WHERE Seguros.Nombre LIKE "%' . $nombre . '%"';

        $query = Callquery($queryString);
        $seguros = array();
        while ($fila = $query->fetch_assoc()) {
            $seguros[] = $fila;
        }
        return $seguros;
    }
    //busca el id de un seguro segun su nombre exacto
    public static function BuscarNombreExacto($nombre) {
        $queryString = 'SELECT idSeguros FROM Seguros WHERE Nombre = "'.$nombre.'"';
        $result = CallQuery($queryString);
        if ($result) return $result->fetch_assoc();
    }

}

?>