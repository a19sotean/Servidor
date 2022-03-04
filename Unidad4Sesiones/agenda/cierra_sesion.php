<?php
    session_start();
    unset($_SESSION['agenda']);
    session_destroy();
    header('Location: agendaContactos.php');
?>