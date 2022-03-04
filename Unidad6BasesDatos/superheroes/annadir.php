<?php
    include "conBD.php";

    $db = conectaDB();
    $sql = "insert into superheroes(nombre) values ('Spiderman')";

    if ($db->query($sql)) {
        echo "OK";
    } else {
        echo "Error";
    }
?>