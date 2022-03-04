<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Add Superhero</title>
</head>

<body>
    <header>
        <h1>Add Superhero</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card grid columns-6">
            <span>user</span>
            <span>psw</span>
            <span>name</span>
            <span>image</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-6">

            <input type="text" name="user" id="user" value="">
            <input type="text" name="psw" id="psw" value="">
            <input type="text" name="name" id="name" value="">
            <input type="text" name="image" id="image" value="">

            <button type="submit" name="submit" value="register">Register</button>
        </form>
    </main>
</body>

</html>