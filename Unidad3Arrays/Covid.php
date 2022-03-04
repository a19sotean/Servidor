<?php
    /**
     * Array de números de casos covid por provincia.
     * 
     * @author Andrea Solís Tejada
     */
    $covid = array("Córdoba" => 50,
                   "Sevilla" => 100,
                   "Huelva" => 30,
                   "Jaen" => 150,
                   "Malaga" => 20,
                   "Almeria" => 10,
                   "Cadiz" => 60,
                   "Granada" => 80);
    foreach ($covid as $casos) {
        echo $casos;
        echo "<br/>";
    }

    foreach ($covid as $ciudad => $casos) {
        echo $ciudad.": ".$casos;
        echo "<br/>";
    }
?>