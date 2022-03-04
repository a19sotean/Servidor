<?php
    define("MAXSIZE", 2000000);
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $allowedFormat = array("image/gif", "image/jpeg", "image/jpg","image/x-png", "image/png");
    define("DIRUPLOAD", "upload/");

    // pathinfo();
    $aNombre = explode(".", $_FILES["file"]["name"]);
    $ext = end($aNombre);

    if (($_FILES["file"]["size"] < MAXSIZE) && (in_array($ext, $allowedExts)) && (in_array($_FILES["file"]["type"], $allowedFormat))) {
        if ($_FILES["file"]["error"] > 0)    {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
    } else {
        $filename = $_FILES["file"]["name"];
            /* Conviene renombrar la imagen bien con el id de una base de datos o con un 
            identificador único
            */
            $filename = time() . $filename; 
            $filename = uniqid().'.'.pathinfo($filename,PATHINFO_EXTENSION);
            ?>

            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Galería</title>
            </head>
            <body>
            <?php
                if (file_exists(DIRUPLOAD .$filename )) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                }
                else {  
                    move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
                    $imagenes = scandir("upload/");
                    foreach ($imagenes as $foto) {
                        if ($foto != "." && $foto != "..") {
                            echo "<img src=\"upload/" . $foto . "\" width=\"300px\" height=\"300px\"></img>";
                        }
                    }
                }   
            ?>
            </body>
            </html>

            <?php
             
            echo "<br/>";
            //echo "<a href=\"".$_SERVER['HTTP_REFERER']."\">Volver</a>"; // No se recomienda.
            echo '<a href="javascript:history.back()">Volver</a>'; // Mejor.
      }

    }
?>