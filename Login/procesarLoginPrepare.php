<?php
require_once "conexion.php";

class Login extends Conexion {

    public function login() {

        $nombre = $_POST["nombre"];
        $contrasena = $_POST["contraseña"];

        $sql = "SELECT nombre 
                FROM usuario 
                WHERE nombre = ? 
                AND contrasena = ?";

        $stmt = $this->conexion->prepare($sql);

        if($stmt) {
            $stmt->bind_param("ss", $nombre, $contrasena);
            $stmt->execute();

            if ($stmt->num_rows > 0) {
                header("Location: bienvenido.php");
                exit;
            } else {
                echo "Usuario o contraseña incorrectos";
            }

            $stmt->close();
        } else {
            echo "Error en la consulta";
        }
    }
}

$login = new Login();
$login->login();
