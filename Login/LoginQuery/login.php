<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Inicio de Sesion</h1>
    </header>
    <main>
        <section>
            <form action="procesarLogin.php" method="post">
                <div class="bloques">
                    <label for="nombre">Usuario: </label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="bloques">
                    <label for="contraseña">Contraseña: </label>
                    <input type="password" name="contraseña" required>
                </div>
                <div id="botones">
                    <input type="submit"  name="boton" value="Enviar">
                    <input type="reset"  name="boton" value="Limpiar">
                </div>
            </form>
        </section>
    </main>
</body>
</html>

