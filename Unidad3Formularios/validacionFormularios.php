<?php
    /**
     * Ejercicio de validación de formularios hecho en clase.
     * 
     * @author Andrea solís Tejada
     */
    function clearData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // Definir variables tipo texto con valores vacíos por defecto.
    $nombre = $correo = $informacionExtra = $sitioWeb = $mascota = ""; 
    // Declarar variables erro para las restricciones de las entradas.
    $nombreErr = $correoErr = $sitioWebErr = $informacionExtraErr = "";

    // Array para la mascota.
    $aMascota = array("Gato", "Perro", "Otro");
    // Variable para error en mascota.
    $mascotaErr = "";

    // Array de vacunas
    $aVacunas = array("Rabia", "Leucemia", "Clamidia", "Perotonitis", "Parvovirus");
    // Array con las opciones seleccionadas.
    $aVacunasSeleccionadas = array();

    // Opciones, con valor y literal.
    $aOpciones = array(
        array("valor"=> 1,
        "literal"=>"Pelo largo"),
        array("valor"=> 2,
        "literal"=>"Pelo corto"),
        array("valor"=> 3,
        "literal"=>"Sin pelo"),
    );
    $opcionSeleccionada = 1;

    // Variables para el color de pelo.
    $colorPelo = array("Negro", "Blanco", "Marrón", "Naranja", "Gris");
    // Array con las opciones seleccionadas.
    $colorSeleccionados = array();

    $lprocesaFormulario = FALSE;
    $lerror = FALSE;
    //Detectamos error en la validación de los datos del formulario.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lprocesaFormulario = TRUE;

        // Validación del nombre
        if (empty($_POST["nombre"])) {
            $nombreErr = "Nombre es requerido";
            $lerror = true;
        } else {
            $nombre = clearData($_POST["nombre"]);
        }

        // Validación del email
        if (empty($_POST["correo"])) {
            $correoErr = "Correo es requerido";
            $lerror = true;
        } else {
            $correo = clearData($_POST["correo"]);
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $correoErr = "Formato de correo incorrecto";
                $lerror = true;
            }
        }

        // Validación URL
        // Propuesta: Formato URL válida.
        $sitioWeb = clearData($_POST["sitioweb"]);
        if (!filter_var($sitioWeb, FILTER_VALIDATE_URL)) {
            $sitioWebErr = "Formato de URL incorrecto";
            $lerror = true;
        }

        // Validación comentario (información extra).
        // Propuesta: Si existe comentario longitud mínima de 3.
        
        if (empty($_POST["informacionextra"]) || strlen($_POST["informacionextra"]) <3 ) {
            $informacionExtraErr = "Información incorrecta";
            $lerror = true;
        } else {
            $informacionExtra = clearData($_POST["informacionextra"]);
        }

        // Validación género (mascota).
        if (empty($_POST["mascota"])) {
            $mascotaErr = "Mascota es requerido";
            $lerror = true;
        } else {
            $mascota = clearData($_POST["mascota"]);
        }

        // Vehículos (vacunas)
        if (isset($_POST["vacunas"])) {
            $aVacunasSeleccionadas = $_POST["vacunas"];
        }
        //Lista desplegable.
        //No hay validación solo carga de datos.
        if (isset($_POST["opciones"])) {
            $opcionSeleccionada = $_POST["opciones"];
        }
        // Selección múltiple
        //No hay validación solo carga de datos.
        if (isset($_POST["colorpelo"])) {
            $colorSeleccionados = $_POST["colorpelo"];
        }
    }
    //Ajustamos bandera de proceso del formulario en función del error.
    if ($lerror) {
        $lprocesaFormulario = FALSE;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
    if (!$lprocesaFormulario) { ?>
    <h1>Validación formulario. PHP</h1>
    <p><span class="error">* Campos requeridos..</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
       Nombre:<input type="text" name="nombre" value="<?php echo $nombre;?>">
              <span class="error">*<?php echo $nombreErr;?></span><br/><br/>
       Correo: <input type="text" name="correo" value="<?php echo $correo;?>">
              <span class="error">* <?php echo $correoErr;?></span><br/><br/>
       Sitio web:   <input type="text" name="sitioweb" value="<?php echo $sitioWeb;?>">
              <span class="error"><?php echo $sitioWebErr;?></span><br/><br/>
       Información extra:<br/>  
              <textarea name="informacionextra" rows="5" cols="40"><?php echo $informacionExtra;?></textarea>
              <span class="error"><?php echo $informacionExtraErr;?></span><br/><br/>
       Mascota:
          <?php
              foreach ($aMascota as $clave=>$valor) {
                      $check ="";
                      if ($mascota == $valor) {$check = "checked";}
                          echo "<input type=\"radio\" name=\"mascota\" value = \"$valor\" $check>$valor";
              }
              echo "<span class=\"error\">* $mascotaErr</span><br/><br/>";
           ?>
     Vacunas:<br/>
         <?php
             foreach ($aVacunas as $valor) {
                   $selected =(in_array($valor,$aVacunasSeleccionadas)) ? 'checked' :''; 
                     echo "<input type =\"checkbox\" name=\"vacunas[]\" value = \"".$valor."\" $selected >". $valor;
               }
         ?>
     <br/><br/>
     Selecciona opción:
         <select name="opciones">
         <?php
               foreach ($aOpciones as $valor) {
                     $selected =($opcionSeleccionada == $valor['valor']) ? 'selected' :''; 
                       echo "<option value = \"".$valor['valor']."\" $selected >". $valor['literal'] ."</option>";
                 }
         ?>
         </select><br/><br/>
      Color de pelo:<br/>
         <select multiple name="colorpelo[]">
         <?php
               foreach ($colorPelo as $valor) {
                       $selected =(in_array($valor,$colorSeleccionados)) ? 'selected' :''; 
                       echo "<option value = \"".$valor."\" $selected >". $valor ."</option>";
                 }
               ?>
         </select><br/><br/>
         <input type="submit" name="submit" value="Submit"><br/><br/>
  </form>
<?php
} // Procesa Formulario
else {
    echo "<h1>Your Input:</h1>";
    echo $nombre;
    echo "<br/>";
    echo $correo;
    echo "<br/>";
    echo $sitioWeb;
    echo "<br/>";
    echo $informacionExtra;
    echo "<br/>";
    echo $mascota;
    echo "<br/>";
    //Bucle para vehículos seleccionados.
    foreach ($aVacunas as $elemento) {
        echo $elemento."<br/>";
    }

    echo $opcionSeleccionada;
    echo "<br/>";

    //Bucle para coches seleccionados.
    foreach ($colorSeleccionados as $elemento) {
        echo $elemento."<br/>";
    }
} ?>
</body>
</html>