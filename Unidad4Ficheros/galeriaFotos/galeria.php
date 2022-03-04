<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andrea</title>
</head>
<body>
    <?php
        $imagenes = scandir("upload/");
        foreach ($imagenes as $foto) {
            if ($foto != "." && $foto != "..") {
                echo "<img src=\"upload/" . $foto . "\" width=\"300px\" height=\"300px\"></img>";
            }
        }
    ?>
    <a href="index.php">volver</a>
</body>
</html>