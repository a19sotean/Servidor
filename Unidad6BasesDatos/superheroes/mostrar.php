<?php
    include "conBD.php";

    $db = conectaDB();
    $sql = "select * from superheroes";
    $resultado = $db->query($sql);
    
    foreach ($resultado as $valor) {
        echo $valor['nombre'];
    }
?>