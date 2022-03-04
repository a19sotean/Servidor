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
    <nav>
        <a href="galeria.php">Ver galería de imágenes</a>
    </nav>
    <div>
        <?php
            if ($_SESSION['auth']) {
                header('Location: subirImg.php');
            } else {
                include "./view/form.view.html";
            }
        ?>
    </div>
</body>
</html>