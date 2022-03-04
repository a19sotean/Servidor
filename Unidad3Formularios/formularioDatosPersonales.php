<?php
    /**
     * @author Andrea Solís Tejada
     */
    $datosPersonales = array(
        "Nombre " => array(
            "tipo" => "text",
            "placeholder" => "nombre",
        ),
        "Apellidos " => array(
            "tipo" => "text",
            "placeholder" => "apellidos",
        ),
        "Direccion " => array(
            "tipo" => "text",
            "placeholder" => "direccion",
        ),
        "Curso " => array(
            "tipo" => "radio",
            "opcion" => array("1DAW", "1ASIR", "2DAW", "2ASIR"),
        ),
        "Repetidor" => array(
            "tipo" => "radio",
            "opcion" => array("Sí", "No"),
        ),
    );
    echo ('<form action="procesaDatosPersonales.php" method="post">');
    foreach ($datosPersonales as $dato => $valor) {
        if ($valor["tipo"] == "text") {
            echo "<label>".$dato."<input type='text' name=$dato placeholder=$dato></label></br>";
        } else if ($valor["tipo"] == "radio") {
            echo "<label>$dato</label></br>";
            foreach ($valor["opcion"] as $curso) {
                echo "<label>".$curso."<input type='radio' name=$dato value=$curso></label></br>";
            }
        }
        
    }
    echo('<input type="submit" value="Enviar">');
?>