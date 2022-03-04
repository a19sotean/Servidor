<?php
    session_start();
    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = false;
    }
    if (isset($_POST['Enviar'])) {
        if (($_POST['usuario'] == 'usuario') && ($_POST['psw'] == '1234')) {
            $_SESSION['auth'] = true;
        }
    }
?>
<!-- Vista -->
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
        <?php
            if ($_SESSION['auth']) {
                echo "<a href='privado.php'>Privado</a>";
                echo "<a href='salir.php'>Salir</a>";
                echo '<a href="cierra_sesion.php">Cerrar sesión</a>';
            }
        ?>
    </nav>
    <div>
        <?php
            if ($_SESSION['auth']) {
                echo "Información de cuenta.... "; //Información de cuenta
            } else {
                include "./view/form.view.html";
            }
        ?>
    </div>
    <h2>Página de inicio</h2>
</body>
</html>