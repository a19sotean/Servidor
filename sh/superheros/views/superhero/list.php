<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Superheroes</title>
</head>

<body>
    <header>
        <h1>Superheroes</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <section>
            <div class="card grid columns-3">
                <span>name</span>
                <span>image</span>
                <span>evolution</span>
            </div>
            <div class='card grid columns-3'>
                <?php
                foreach ($data as $superhero) {
                    echo '<div>' . $superhero['name'] . '</div>';
                    echo '<div>' . $superhero['image'] . '</div>';
                    echo '<div>' . $superhero['evolution'] . '</div>';
                }
                ?>
            </div>
        </section>

    </main>

</body>

</html>