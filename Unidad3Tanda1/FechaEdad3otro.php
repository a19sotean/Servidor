<?php
    /**
     * 3. Carga fecha de nacimiento en variables y calcula la 
     * edad.
     * @author Andrea Solís Tejada
     */
    $fechaNacimiento = new DateTime("2000-10-13");
    $fechaHoy = new DateTime();
    $edad = $fechaHoy -> diff($fechaNacimiento);
    print "<br>Edad: ";
    echo $edad -> y;
?>