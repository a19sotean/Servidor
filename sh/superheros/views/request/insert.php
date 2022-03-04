<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Add Request</title>
</head>

<body>
    <header>
        <h1>Add Request</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card grid columns-6">
            <span>title</span>
            <span>description</span>
            <span>done</span>
            <span>id-superhero</span>
            <span>id-citizen</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-6">
            <input type="text" name="title" id="title" value="">
            <input type="text" name="description" id="description" value="">
            <input type="text" name="done" id="done" value="">
            <select name="id_superhero" id="id_superhero">
                <?php
                $superheros = $data[0];
                foreach ($superheros as $superhero) {
                    echo '<option value="' . $superhero['id'] . '">' . $superhero['id'] . '</option>';
                }
                ?>
            </select>
            <select name="id_citizen" id="id_citizen">
                <?php
                $citizens = $data[1];
                foreach ($citizens as $citizen) {
                    echo '<option value="' . $citizen['id'] . '">' . $citizen['id'] . '</option>';
                }
                ?>
            </select>

            <button type="submit" name="submit" value="insert">Insert</button>
        </form>

    </main>
</body>

</html>