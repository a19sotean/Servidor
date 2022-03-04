<?php
/**
 * 4. ¿Cuál es la salida del siguiente script?
 * Prueba el script y modifícalo para las palabras DAW y DWES 
 * apararezcan en negrita.
 * Investiga uso de print y printf para salida de texto.
 * @author Andrea Solís Tejada
 */
    $ciclo="DAW";
    $modulo="DWES";
    print "<p>";
    printf("<b>%s</b> es un módulo de %d curso de <b>%s</b>", $modulo, 2, $ciclo);
    print "</p>";
    /**
     * Tanto print como printf sirven para mostrar algo por pantalla.
     * -print no es realmente una función (es un constructor de lenguaje) 
     * por lo tanto no es necesario usar paréntesis para indicar su 
     * lista de argumentos.
     * -printf produce una salida de acuerdo con el format.
     */
?>