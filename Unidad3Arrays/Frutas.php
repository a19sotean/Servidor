<?php
    /**
     * Array asociativo bidimensional de fruta.
     * 
     * @author Andrea Solís Tejada
     */
    $frutas = array(
                "manzana" => array(
                                "color" => "rojo",
                                "sabor" => "dulce",
                                "forma" => "redondeada"),
                "naranja" => array(
                                "color" => "naranja",
                                "sabor" => "ácido",
                                "forma" => "redondeada"),
                "plátano" => array(
                                "color" =>"amarillo",
                                "sabor" => "paste-y",
                                "forma" => "aplatanada")
                );

    foreach ($frutas as $fruta => $caracteristica) {
        echo "<b>".$fruta.": </b>";
        echo "<br/>";
        foreach ($caracteristica as $caracteristicas) {
            echo $caracteristicas;
            echo "<br/>";
        }
    }
?>