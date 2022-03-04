<?php
    /**
     * Crea un script que defina un array de números enteros y utilizando
     * una función anónima genere un array con el cuadrado de los mismos.
     * 
     * @author Andrea Solís Tejada
     */
    $numeros = array(2, 5, 12, 8);
    $cuadrado = array_map(function ($num) {
        return $num*$num;
    }, $numeros);
    print_r($cuadrado);
?>