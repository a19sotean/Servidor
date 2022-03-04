<?php
    /**
     * 2. Sumar los 3 primeros números pares.
     * @author Andrea Solís Tejada
     */

    $suma = 0;
    echo "Los números pares son: ";
    for ($i = 2; $i <= 6; $i++) {
        if ($i % 2 == 0){
            print $i." ";
            $suma = $suma + $i;
        }
    }
    print "<br>La suma es: ".$suma;
?>