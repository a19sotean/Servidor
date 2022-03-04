<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Add Ability</title>
</head>

<body>
    <header>
        <h1>Add Ability</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card grid columns-2">
            <span>name</span>
            <span>actions</span>
        </div>

        <form action="" method="post" class="card grid columns-2">
            <input type="text" name="name" id="name" value="">
            <button type="submit" name="submit" value="insert">Insert</button>
        </form>

    </main>

</body>

</html>