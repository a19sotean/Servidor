<?php
/**
 * 9. Escribir un script que utilizando variables permita 
 * obtener el siguiente resultado:
 * Valor es string.
 * Valor es double.
 * Valor es boolean.
 * Valor es integer.
 * Valor is NULL.
 * @author Andrea Solís Tejada
 */
    $cadena = "abc";
    $doble = 1.23;
    $buleano = True;
    $entero = 123;
    $nulo = NULL;
    print "<p>Valor es ";
    echo gettype($cadena);
    print "</p>";
    print "<p>Valor es ";
    echo gettype($doble);
    print "</p>";
    print "<p>Valor es ";
    echo gettype($buleano);
    print "</p>";
    print "<p>Valor es ";
    echo gettype($entero);
    print "</p>";
    print "<p>Valor is ";
    echo gettype($nulo);
    print "</p>";
?>