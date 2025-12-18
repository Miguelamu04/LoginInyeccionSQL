<?php
// Incluimos el archivo de conexión a la base de datos
require_once "conexion.php";

// Creamos la clase Login que hereda de la clase Conexion
class Login extends Conexion {

    // Método para realizar el login
    public function login() {

        // Guardamos los datos enviados por el formulario mediante POST
        $nombre = $_POST["nombre"];
        $contrasena = $_POST["contraseña"];

        // Consulta SQL para comprobar si existe un usuario con ese nombre y contraseña
        $sql = "SELECT nombre 
                FROM usuario 
                WHERE nombre = ? 
                AND contrasena = ?";

        // Preparamos la consulta para evitar inyecciones SQL
        $stmt = $this->conexion->prepare($sql);

        // Comprobamos que la consulta se ha preparado correctamente
        if($stmt) {

            // Asociamos los parámetros a la consulta (ss = dos strings)
            $stmt->bind_param("ss", $nombre, $contrasena);

            // Ejecutamos la consulta
            $stmt->execute();

            // Comprobamos si la consulta ha devuelto alguna fila
            if ($stmt->num_rows > 0) {
                // Si existe el usuario, redirigimos a la página de bienvenida
                header("Location: bienvenido.php");
                exit;
            } else {
                // Si no existe, mostramos un mensaje de error
                echo "Usuario o contraseña incorrectos";
            }

            // Cerramos la consulta preparada
            $stmt->close();

        } else {
            // Mensaje de error si la consulta no se pudo preparar
            echo "Error en la consulta";
        }
    }
}

// Creamos un objeto de la clase Login
$login = new Login();

// Llamamos al método login
$login->login();
