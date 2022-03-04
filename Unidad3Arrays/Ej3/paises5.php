<?php
    /**
     * 3e. Array que almacena y muestra la información sobre continentes,
     * países, capitales y banderas.
     * 
     * @author Andrea Solís Tejada
     */
    $continentes = array(
        array("continente" => "Europa", "paises" => array(
            array("pais" => "España", "capital" => "Madrid", "bandera" => "img\-españa.jpg"), 
            array("pais" => "Francia", "capital" => "Paris", "bandera" => "img\-francia.jpg"), 
            array("pais" => "Italia", "capital" => "Roma", "bandera" => "img\italia.jpg"))),
        array("continente" => "África", "paises" => array(
            array("pais" => "Marruecos", "capital" => "Rabat", "bandera" => "img\marruecos.jpg"), 
            array("pais" => "Nigeria", "capital" => "Abuya", "bandera" => "img\-nigeria.jpg"), 
            array("pais" => "Senegal", "capital" => "Dakar", "bandera" => "img\senegal.png"))),
        array("continente" => "Asia", "paises" => array(
            array("pais" => "Japón", "capital" => "Tokio", "bandera" => "img\japon.png"), 
            array("pais" => "China", "capital" => "Pekín", "bandera" => "img\china.png"), 
            array("pais" => "Corea del sur", "capital" => "Seúl", "bandera" => "img\corea.jpg"))),
        array("continente" => "América", "paises" => array(
            array("pais" => "Estados Unidps", "capital" => "Washington D. C.", "bandera" => "img\-estadosunidos.jpg"), 
            array("pais" => "México", "capital" => "Ciudad de México", "bandera" => "img\mexico.png"), 
            array("pais" => "Argentina", "capital" => "Buenos Aires", "bandera" => "img\argentina.png"))),
        array("continente" => "Oceanía", "paises" => array(
            array("pais" => "Australia", "capital" => "Canberra", "bandera" => "img\australia.png"), 
            array("pais" => "Nueva Zelanda", "capital" => "Wellington", "bandera" => "img\-nuevazelanda.jpg"), 
            array("pais" => "Papúa Nueva Guinea", "capital" => " Puerto Moresby", "bandera" => "img\papua.png"))),
    );

    foreach ($continentes as $continente) {
        echo "<b>".$continente["continente"]."</b>";
        echo("<table border>");
        echo("<tr><th>País</th><th>Capital</th><th>Bandera</th></tr>");
        foreach ($continente["paises"] as $pais) {
            echo("<tr><td>" . $pais["pais"] . "</td><td>" . $pais["capital"] . "</td><td><img width='300' height='200' src=\"" . $pais["bandera"] . "\"/>");
        }
    echo("</table>");
    }
?>