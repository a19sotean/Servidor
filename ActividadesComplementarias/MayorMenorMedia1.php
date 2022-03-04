<?php
    /**
     * 1. Escribe un programa que genere e imprima 20 números 
     * aleatorios (0-100), mostrando también el mayor, el menor y 
     * la media.
     * 
     * @author Andrea Solís Tejada
     */
    $numAleatorio;
    $mayor = 0;
    $menor = 100;
    $suma = 0;
    $media = 0;

    echo "Números aleatorios generados:<br>";
    for ($i = 1; $i <= 20; $i++) {
        $numAleatorio = rand(0, 100);
        echo "Número ".$i.": ".$numAleatorio."<br>";
        $suma += $numAleatorio;

        if ($mayor < $numAleatorio) {
            $mayor = $numAleatorio;
        } if ($menor > $numAleatorio) {
            $menor = $numAleatorio;
        }
    }
    echo "<br>Mayor: ".$mayor;
    echo "<br>Menor: ".$menor;
    echo "<br>Media: ".($suma / 20);
?>