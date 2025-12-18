<?php
// Incluimos el archivo donde se realiza la conexión con la base de datos
require_once "conexion.php";

// Creamos la clase Login que hereda de la clase Conexion
class Login extends Conexion {

    // Método que se encarga de comprobar el login del usuario
    public function login() {

        // Recogemos los datos enviados desde el formulario por método POST
        $nombre = $_POST["nombre"];
        $contrasena = $_POST["contraseña"];

        // Creamos la consulta SQL
        // En este caso NO se usan consultas preparadas, por lo que es vulnerable a inyección SQL
        $sql = "SELECT nombre 
                FROM usuario 
                WHERE nombre = '$nombre' 
                AND contrasena = '$contrasena'";

        // Ejecutamos la consulta directamente contra la base de datos
        $resultado = $this->conexion->query($sql);

        // Comprobamos si la consulta ha devuelto algún resultado
        if ($resultado && $resultado->num_rows > 0) {
            // Si existe el usuario, redirigimos a la página de bienvenida
            header("Location: bienvenido.php");
            exit;
        } else {
            // Si no existe, mostramos un mensaje de error
            echo "Usuario o contraseña incorrectos";
        }
    }
}

// Ejemplo de inyección SQL:
// Si en el campo usuario o contraseña se introduce:
// ' OR '1'='1
// la condición siempre se cumple y permite acceder sin credenciales válidas

// Creamos un objeto de la clase Login
$login = new Login();

// Llamamos al método login
$login->login();
