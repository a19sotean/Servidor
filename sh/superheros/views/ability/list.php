<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Abilities</title>
</head>

<body>
    <header>
        <h1>Abilities</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <section>
            <?php echo '<a href="/ability/add' . '" class="add">NEW</a>'; ?>
            <div class=" card grid columns-5">
                <span>id</span>
                <span>name</span>
                <span>created-at</span>
                <span>updated-at</span>
                <span>actions</span>
            </div>
            <?php
            foreach ($data as $ability) {
                echo '<form action="" method="post" class="card grid columns-5">';
                echo '<input type="number" name="id" id="id" value="' . $ability['id'] . '" readonly>';
                echo '<input type="text" name="nombre" id="nombre" value="' . $ability['name'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $ability['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $ability['updated_at'] . '" readonly>';
                echo '<div>';
                echo '<a href="/ability/edit/' . $ability['id'] . '" class="update">EDIT</a>';
                echo '<a href="/ability/del/' . $ability['id'] . '" class="delete">DELETE</a>';
                echo '</div>';
                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>