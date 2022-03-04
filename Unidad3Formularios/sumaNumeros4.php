<?php
    /**
    * 4. Crear un script para sumar una serie de números. El número de números 
    * a sumar será introducido en un formulario.
    * 
    * @author Andrea Solís Tejada
    */
    $formulario = array(
        "numeros" => array("text", "n1, n2, n3, ...", ""),
        "enviar" => array("submit", NULL, "Enviar")
    );
    
    function clearData($cadena)
    {
        return stripslashes(htmlspecialchars(trim($cadena)));
    }

    $todoOk = false;
    $numeros = "";
    $msgErrorNumeros = "";

    //Validación
    if (isset($_POST['enviar'])) {
        $numeros = clearData($_POST['numeros']);
        $todoOk = true;
        $numeros = explode(",", $numeros);
        foreach ($numeros as $num) {
            if (!is_numeric($num)) {
                $msgErrorNumeros = "Algún número mal introducido o campo vacío";
                $todoOk = false;
            }
        }
    }

    echo '<form action ="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
    echo "<h3>Introduce números separados por comas</h3>";
    foreach ($formulario as $name => $array) {
        if ($array[1] != NULL) {
            echo '<input type="' . $array[0] . '" name="' . $name . '" placeholder="' . $array[1] . '" value="' . $array[2] . '"/>' . $msgErrorNumeros . '<br/>';
        } else {
            echo '<input type="' . $array[0] . '" name="' . $name . '" value="' . $array[2] . '"/>';
        }
    }

    if ($todoOk) {
        $sum = 0;
        foreach ($numeros as $num) {
            $sum += $num;
        }
        echo "<p>La suma de los números introducidos es: " . $sum . '</p>';
    }
?>