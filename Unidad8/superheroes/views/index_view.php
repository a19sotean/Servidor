<!doctype html>
    <html lang="es">
        <head> 
            <meta charset="UTF-8">
            <title>SuperHeroes</title>
        </head>
        <body>
        <h1>Superhéroes</h1>
        <form action="superheroes/search" method="post">
            <input type="text" name="busqueda" id="">
            <input type="submit" name="buscar" value="Buscar"><br><br>
        </form>

        <a href="superheroes/add">Nuevo Heroe</a>
            <?php

                foreach ($data as $hero) {
                    echo "<div>".$hero['id']. " " . $hero['nombre']." <a href='superheroes/edit/" . $hero['id']."'>Editar</a> <a href='superheroes/del/" . $hero['id']."'>Borrar</a></div>";
                }
            ?>
        </body>
    </html>