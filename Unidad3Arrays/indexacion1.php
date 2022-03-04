<?php
    /**
     * 1. Indexación de los ejercicios mediante un array.
     * 
     * @author Andrea Solís Tejada
     */
    $ejercicios = array(
        "Tema2" => array(
            array("Ejercicio" => "Ejercicio 1 ", "Enlace" => "<a src='../Unidad2/holaMundo1.php'>Hola mundo</a>"),
        ),             
    );
    $tema2 = $ejercicios["Tema2"];

    foreach ($tema2 as $tema) {
        echo "<b>".$tema.": </b>";
        //echo "<br/>";
        //foreach ($valor as $valores) {
          //  echo $valores;
            //echo "<br/>";
       // }
    }
?>