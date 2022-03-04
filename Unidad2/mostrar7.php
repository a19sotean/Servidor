<?php
/**
 * 7. Escribir un script que declare una variable y muestre la 
 * siguiente información en pantalla:
 * Valor actual 8.
 * Suma 2. Valor ahora 10.
 * Resta 4. Valor ahora 6.
 * Multipica por 5. Valor ahora 30.
 * Divide por 3. Valor ahora 10.
 * Incrementa el valor en 1. Valor ahora 11.
 * Decrementa el valor en 1. Valor ahora 11.
 * @author Andrea Solís Tejada
 */
    $variable = 8;
    print "<p>";
    printf ("Valor actual %s", $variable);
    print "</p>";
    print "<p>";
    printf ("Suma %d. Valor ahora %d", 2, $variable+=2);
    print "</p>";
    print "<p>";
    printf ("Resta %d. Valor ahora %d", 4, $variable-=4);
    print "</p>";
    print "<p>";
    printf ("Multiplica por %d. Valor ahora %d", 5, $variable*=5);
    print "</p>";
    print "<p>";
    printf ("Divide por %d. Valor ahora %d", 3, $variable/=3);
    print "</p>";
    print "<p>";
    printf ("Incrementa el valor en %d. Valor ahora %d", 1, $variable=++$variable);
    print "</p>";
    print "<p>";
    printf ("Decrementa el valor en %d. Valor ahora %d", 1, $variable=$variable--);
    print "</p>";
?>