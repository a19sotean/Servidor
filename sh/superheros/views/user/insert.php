<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Add User</title>
</head>

<body>
    <header>
        <h1>Add User</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card grid columns-3">
            <span>user</span>
            <span>password</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-3">
            <input type="text" name="user" id="user" value="">
            <input type="text" name="psw" id="psw" value="">
            <button type="submit" name="submit" value="insert">Insert</button>
        </form>';

    </main>

</body>

</html>