<?php
/**
 * 8. A veces es necesario conocer exactamente el contenido 
 * de una variable. Piensa como puedes hacer esto y escribe 
 * un script con la siguiente salida:
 * string(5) “Harry”
 * Harry
 * int(28)
 * NULL
 * @author Andrea Solís Tejada
 */
    $cadena = "Harry";
    $numero = 28;
    $null = NULL;
    print "<p>";
    echo var_dump($cadena);
    print "</p>";
    print "<p>";
    echo $cadena;
    print "</p>";
    print "<p>";
    echo var_dump($numero);
    print "</p>";
    print "<p>";
    echo var_dump($null);
    print "</p>";
?>