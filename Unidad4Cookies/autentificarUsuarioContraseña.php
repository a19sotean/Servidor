<?php

/**
 * No funciona bien, código correcto en comprobarUsuario.php
 */

    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = ""; 
    $contraseña = "";
    // Variables de error
    $errUsuario = "";
    $errContraseña = "";

    $lprocesaFormulario = false;
    $lerror = false;

    if (isset($_POST["Submit"])) {
        if (empty($_POST["usuarios"])) {
            $errUsuario = "Nombre requerido";
            $lerror = true;
        } else {
            $usuario = test_input($_POST["usuario"]);
        }
        if (empty($_POST["contraseña"])) {
            $errContraseña = "Contraseña requerida";
            $lerror = true;
        } else {
            $contraseña = test_input($_POST["contraseña"]);
        }
        if ($lerror) {
            $lprocesaFormulario = false;
        }
    }

    if (!$lprocesaFormulario) { ?>
        <h1>Iniciar sesión</h1>
        <p><span class="error">* Campos requeridos...</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Usuario <input type="text" name="name" value="<?php echo $usuario;?>">
                <span class="error">* <?php echo $errUsuario;?></span><br/><br/>
            Contraseña <input type="password" name="password" value="<?php echo $contraseña;?>">
                <span class="error">* <?php echo $errContraseña;?></span><br/><br/>
            <input type="submit" name="submit" value="Enviar"><br/><br/></form>
    <?php
    } // Procesa Formulario
    else {
        echo "<h1>Your Input:</h1>";
        echo $nombre;
        echo "<br/>";
        echo $contraseña;
    } ?>