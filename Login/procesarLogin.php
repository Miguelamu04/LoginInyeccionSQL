<?php
require_once "conexion.php";

class Login extends Conexion {

    public function login() {

        $nombre = $_POST["nombre"];
        $contrasena = $_POST["contraseña"];

        $sql = "SELECT nombre 
                FROM usuario 
                WHERE nombre = '$nombre' 
                AND contrasena = '$contrasena'";

        $resultado = $this->conexion->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            header("Location: bienvenido.php");
            exit;
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    }
}

//Inyeccion SQL -> ' OR'1' = '1
$login = new Login();
$login->login();
