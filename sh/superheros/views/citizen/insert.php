<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Add Citizen</title>
</head>

<body>
    <header>
        <h1>Add Citizen</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card grid columns-4">
            <span>name</span>
            <span>email</span>
            <span>id-user</span>
            <span>actions</span>
        </div>

        <form action="" method="post" class="card grid columns-4">
            <input type="text" name="name" id="name" value="">
            <input type="text" name="email" id="email" value="">
            <select name="idUser" id="idUser">
                <?php
                $users = $data;
                foreach ($users as $user) {
                    echo '<option value="volvo">' . $user['id'] . '</option>';
                }
                ?>
            </select> <button type="submit" name="submit" value="insert">Insert</button>
        </form>';

    </main>

</body>

</html>