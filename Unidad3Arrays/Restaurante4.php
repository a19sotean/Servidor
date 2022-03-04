<?php
    /**
     * 4. Un restaurante dispone de una carta de 3 primeros, 5 
     * segundos y 3 postres. Almacenar información incluyendo foto y 
     * mostrar los menús disponibles. Mostrar el precio del menú 
     * suponiendo que éste se calcula sumando el precio de cada uno 
     * de los platos incluidos y con un descuento del 20 %.
     * 
     * @author Andrea Solís Tejada
     */
    $restaurante = array(
        "primero" => array(
            array("comida" => "Ensalada", "precio" => "3", "imagen" => "imgRestaurante\-ensalada.jpg"),
            array("comida" => "Salmorejo", "precio" => "5", "imagen" => "imgRestaurante\salmorejo.jpg"),
            array("comida" => "Sopa de pollo", "precio" => "4", "imagen" => "imgRestaurante\sopa.jpg"),
        ),
        "segundo" => array(
            array("comida" => "Merluza con verduritas", "precio" => "7", "imagen" => "imgRestaurante\merluza.jpg"),
            array("comida" => "Costillas de cerdo en salsa BBQ", "precio" => "10", "imagen" => "imgRestaurante\costillas.jpg"),
            array("comida" => "Ternera en salsa", "precio" => "9", "imagen" => "imgRestaurante\-ternera.jpeg"),
            array("comida" => "Lasaña", "precio" => "6", "imagen" => "imgRestaurante\lasaña.jpg"),
            array("comida" => "Macarrones", "precio" => "6", "imagen" => "imgRestaurante\macarrones.jpg"),
        ),
        "postre" => array(
            array("comida" => "Crepes con nutella", "precio" => "4", "imagen" => "imgRestaurante\crepes.jpeg"),
            array("comida" => "Tarta de queso", "precio" => "4", "imagen" => "imgRestaurante\-tartaqueso.jpg"),
            array("comida" => "Tarta de 3 chocolates", "precio" => "4", "imagen" => "imgRestaurante\-tartachocolate.jpg"),
        )
    );
    $primero = $restaurante["primero"];
    $segundo = $restaurante["segundo"];
    $postre = $restaurante["postre"];

    foreach ($primero as $comida1) {
        echo("<table border>");
        foreach($segundo as $comida2) {
            foreach($postre as $comida3) {
                $precio = 0;
                echo("<tr>");
                echo("<td>".$comida1["comida"]."<img src=\"".$comida1["imagen"]."\" width=\"150\" height=\"100\"></td>");
                echo("<td>".$comida2["comida"]."<img src=\"".$comida2["imagen"]."\" width=\"150\" height=\"100\"></td>");
                echo("<td>".$comida3["comida"]."<img src=\"".$comida3["imagen"]."\" width=\"150\" height=\"100\"></td>");
    
                // Precio 
                $precio = $comida1["precio"] + $comida2["precio"] + $comida3["precio"];
                $precio = ($precio * 0.8);
                echo("<td>Precio: ".$precio."€</td>");
    
                echo("</tr>");
            }
        }
        echo("</table>");
        echo("<br>");
    }
?>