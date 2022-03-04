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
            <?php echo '<a href="/sh/add" class="add">NEW</a>'; ?>
            <div class="card grid columns-8">
                <span>id</span>
                <span>name</span>
                <span>image</span>
                <span>evolution</span>
                <span>id_user</span>
                <span>created-at</span>
                <span>updated-at</span>
                <span>actions</span>
            </div>
            <?php
            foreach ($data as $superhero) {
                echo '<form action="" method="post" class="card grid columns-8">';
                echo '<input type="number" name="id" id="id" value="' . $superhero['id'] . '" readonly>';
                echo '<input type="text" name="name" id="name" value="' . $superhero['name'] . '" readonly>';
                echo '<input type="text" name="image" id="image" value="' . $superhero['image'] . '" readonly>';
                echo '<input type="text" name="evolution" id="evolution" value="' . $superhero['evolution'] . '" readonly>';
                echo '<input type="text" name="id_user" id="id_user" value="' . $superhero['id_user'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $superhero['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $superhero['updated_at'] . '" readonly>';
                echo '<div>';
                echo '<a href="/sh/update/' . $superhero['id'] . '">EDIT</a>';
                echo '<a href="/sh/delete/' . $superhero['id'] . '">DELETE</a>';
                echo '</div>';
                echo '</form>';
            }
            ?>
            <!-- TODO abilities -->
        </section>

    </main>

</body>

</html>