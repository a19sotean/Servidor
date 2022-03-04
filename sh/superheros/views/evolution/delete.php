<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Delete evolution</title>
</head>

<body>
    <header>
        <h1>Delete evolution</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card">
            <span>name</span>
        </div>
        <form action="" method="post" class="card">
            <input type="text" name="name" id="name" value="<?php echo $data['name'] ?>" readonly>

            <button type=" submit" name="submit" value="delete">Delete</button>
        </form>
    </main>

</body>

</html>