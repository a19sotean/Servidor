<?php
/**
 * 2. Ficha personal con los datos cargados en variables. 
 * El resultado debe mostrar una foto personal.
 * @author Andrea Solís Tejada
 */
    $nombre = "Andrea";
    $apellido1 = "Solís";
    $apellido2 = "Tejada";
    $descripcion = "Mi nombre es $nombre, estudio 2º de DAW y amo a los gatos.";
    
    echo "<h1>$nombre $apellido1 $apellido2</h1>";
    echo '<img src="imagenPersonal.PNG">';
    echo "<h2>Descripción</h2>";
    echo "<p>$descripcion</p>";
?>