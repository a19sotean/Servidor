<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Evolutions</title>
</head>

<body>
    <header>
        <h1>Evolutions</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <section>
            <?php echo '<a href="/evolution/add' . '" class="add">NEW</a>'; ?>
            <div class="card">
                <span>name</span>
            </div>
            <?php
            foreach ($data as $evolution) {
                echo '<form action="" method="post" class="card">';
                echo '<input type="text" name="name" id="name" value="' . $evolution['name'] . '" readonly>';

                echo '<div>';
                echo '<a href="/evolution/edit/' . $evolution['name'] . '" class="update">EDIT</a>';
                echo '<a href="/evolution/del/' . $evolution['name'] . '" class="delete">DELETE</a>';
                echo '</div>';

                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>