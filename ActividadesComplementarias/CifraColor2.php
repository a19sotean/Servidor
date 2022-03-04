<?php
    /**
     * 2. Escribe un programa que genere e imprima un número aleatorio 
     * de 4 cifras, mostrando a continuación cada una de sus cifras 
     * en un color diferente.
     * 
     * @author Andrea Solís Tejada
     */
    $r;
    $g;
    $b;
    $bgcolor;
    $numAleatorio = array(rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9));
    foreach ($numAleatorio as $valor) {
        echo $valor;
    }
    foreach ($numAleatorio as $valor) {
        $r = mt_rand( 128, 255 );
        $g = mt_rand( 128, 255 );
        $b = mt_rand( 128, 255 );
        $bgcolor = 'rgb('.$r.','.$g.','.$b.')';
        echo "<br><span style='color:$bgcolor'>$valor</span>";
    }
?>