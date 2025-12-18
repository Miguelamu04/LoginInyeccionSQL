<?php
require_once "configdb.php";
class Conexion {
    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CLAVE, NOMBRE_BD);
    }
}
