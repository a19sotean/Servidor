<?php
    session_start();
    if (!$_SESSION['auth']) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Ejemplo de autentificación</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="publico.php">Público</a>
        <a href="privado.php">Privado</a>
        <a href="salir.php">Salir</a>
        <a href="cierra_sesion.php">Cerrar sesión</a>
    </nav>
    <div>
        <?php
            echo "Información de cuenta.... "; //Información de cuenta
        ?>
    </div>
    <h2>Página privada</h2>
</body>
</html>