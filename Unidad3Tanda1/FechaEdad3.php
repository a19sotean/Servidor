<?php
    /**
     * 3. Carga fecha de nacimiento en variables y calcula la 
     * edad.
     * @author Andrea Solís Tejada
     */
    $dia = 13;
    $mes = 10;
    $anno = 2000;
    $diaActual = getdate()["mday"];
    $mesActual = getdate()["mon"];
    $annoActual = getdate()["year"];
    $edad = 0;

    printf ("La fecha de nacimiento es: %d/%d/%d.", $dia, $mes, $anno);
    printf ("<br>La fecha actual es: %d/%d/%d.", $diaActual, $mesActual, $annoActual);

    if ($anno < $annoActual) {
        if ($mesActual > $mes) {
            $edad = $annoActual - $anno;
            print "<br>Edad: ".$edad;
        } else if ($mesActual < $mes) {
            $edad = ($annoActual - $anno) - 1;
            print "<br>Edad: ".$edad;
        } else if ($mesActual == $mes) {
            if ($diaActual < $dia) {
                $edad = ($annoActual - $anno) - 1;
                print "<br>Edad: ".$edad;
            } else {
                $edad = $annoActual - $anno;
                print "<br>Edad: ".$edad;
            }
        } 
    }
?>