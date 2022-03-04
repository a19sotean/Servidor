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
    <title>Andrea Solís Tejada</title>
</head>
    <body>
        <h1>Galería de imágenes</h1>
        <form action="upload_file.php" method="post" enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file"><br/>
            <input type="submit" name="submit" value="Submit">
        </form>
        <a href="cierra_sesion.php">Cerrar sesión</a>
    </body>
</html>