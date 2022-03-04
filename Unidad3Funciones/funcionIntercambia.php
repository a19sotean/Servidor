<?php
    /**
     * Ejercicio de clase.
     * Crear una función que intercambia 2 números por referencia.
     * 
     * @author Andrea Solís Tejada
     */

    $x = 0;
    $y = 10;

    function intercambia(&$a, &$b) {
        $c = $a;
        $a = $b;
        $b = $c;
    }

    echo $x."<br/>";
    echo $y."<br/>";
    intercambia($x, $y);
    echo $x."<br/>";
    echo $y."<br/>";
?>