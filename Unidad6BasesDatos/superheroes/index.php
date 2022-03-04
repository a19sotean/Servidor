<?php
require 'conBD.php';
$db = conectaDB();

if ($_GET) {
    if ($_GET['nombreModificado']) {

        $pstm = $db->prepare("UPDATE superheroes SET nombre = :nombre WHERE id = :id");
        $id = $_GET['id'];
        $nombre = $_GET['nombreModificado'];
        $pstm->bindParam(':id', $id);
        $pstm->bindParam(':nombre', $nombre);
        $pstm->execute();
    }
}

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

<?php

$pstm = $db->prepare("SELECT * FROM superheroes");
$pstm->execute();
$result = $pstm->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $key => $superheroe) {
    echo $superheroe['nombre'] . "<a href='./del.php?id={$superheroe['id']}' >DEL </a>" . "<a href='./edit.php?id={$superheroe['id']}&name={$superheroe['nombre']}' >EDIT </a>" . "<br>";
}
