<?php
    session_start();
    if (!isset($_SESSION['agenda'])) {
        header('Location: agendaContactos.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Agenda de contactos</h1>
    <a href="agendaContactos.php">Inicio</br></a>
    <a href="cierra_sesion.php">Borrar datos de la agenda</a>
    <h2>Seleccionar destinatarios</h2>
    <?php
    // Propuesta sustituir por un checkbox de selección de destinatarios.
        foreach ($_SESSION['agenda'] as $clave => $valor) {
            echo $valor['nombre'].' '.$valor['telefono'].'</br>';
        }
    ?>
</body>
</html>