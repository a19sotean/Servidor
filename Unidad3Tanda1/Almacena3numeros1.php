<?php
    /**
     * 1. Almacena tres números en variables y escribirlos en 
     * pantalla de manera ordenada.
     * @author Andrea Solís Tejada
     */
    $numero1 = 20;
    $numero2 = 70;
    $numero3 = 43;

    echo "<p>";
    printf ("Los números son: %d, %d y %d", $numero1, $numero2, $numero3);
    echo "<p>";
    print ("Los números ordenados son: ");
    echo "</p>";
    echo "<p>";
    if ($numero1 < $numero2 && $numero1 < $numero3) {
        echo $numero1;
    } else if ($numero2 < $numero1 && $numero2 < $numero3) {
        echo $numero2;
    } else if ($numero3 < $numero1 && $numero3 < $numero2) {
        echo $numero3;
    }
    echo "</p>";

    echo "<p>";
    if ($numero1 < $numero2 && $numero1 > $numero3 || $numero1 > $numero2 && $numero1 < $numero3) {
        echo $numero1;
    } else if ($numero2 < $numero1 && $numero2 > $numero3 || $numero2 > $numero1 && $numero2 < $numero3) {
        echo $numero2;
    } else if ($numero3 < $numero1 && $numero3 > $numero2 || $numero3 > $numero1 && $numero3 < $numero2) {
        echo $numero3;
    }
    echo "</p>";

    echo "<p>";
    if ($numero1 > $numero2 && $numero1 > $numero3) {
        echo $numero1;
    } else if ($numero2 > $numero1 && $numero2 > $numero3) {
        echo $numero2;
    } else if ($numero3 > $numero1 && $numero3 > $numero2) {
        echo $numero3;
    }
    echo "</p>";
?>