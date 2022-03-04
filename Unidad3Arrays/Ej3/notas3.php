<?php
    /**
     * 3c. Array que permite almacenar y mostrar la nota de los alumnos de 
     * 2ºDAW para el módulo DWES.
     * 
     * @author Andrea Solís Tejada
     */
    $notas = array(
        array("alumno" => "Andrea", "nota" => 5),
        array("alumno" => "Rubén", "nota" => 9),
        array("alumno" => "Laura", "nota" => 7),
        array("alumno" => "Jesús", "nota" => 10),
        array("alumno" => "Carlos", "nota" => 3)
    );

    foreach ($notas as $nombre => $nota) {
        foreach ($nota as $puntuacion) {
            echo $puntuacion;
            echo "<br/>";
        }
    }
?>