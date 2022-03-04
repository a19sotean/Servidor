<?php
    /**
     * Array asociativo bidimensional de familias con sus miembros.
     * 
     * @author Andrea Solís Tejada
     */
    $families = array (
                "Griffin"=>array ("Peter", "Lois", "Megan"),
                "Quagmire"=>array("Glenn"),
                "Brown"=>array("Cleveland", "Loretta", "Junior")
                );
    foreach ($families as $apellido => $familiares) {
        echo "<b>Familia ".$apellido.": </b>";
        echo "<br/>";
        foreach ($familiares as $nombre) {
            echo $nombre;
            echo "<br/>";
        }
    }
?>