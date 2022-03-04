<?php
    function clearData($cadena) {
        $clear = trim($cadena);
        $clear = htmlspecialchars($clear);
        $clear = stripslashes($clear);
        return $cadena;
    }
    
    include "conBD.php";
    $db = conectaDB();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base datos superhéroes</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Nombre: </label>
        <input type="text" name="nombre">
        <input type="submit" value="Añadir superhéroe" name="annadir">
    </form>
</body>
</html>