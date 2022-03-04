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
        <div class="card grid columns-5">
            <span>name</span>
            <span>image</span>
            <span>evolution</span>
            <span>id_user</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-5">
            <input type="text" name="name" id="name" value="">
            <input type="text" name="image" id="image" value="">
            <select name="evolution" id="evolution">
                <?php
                $evolutions = $data[1];
                foreach ($evolutions as $evolution) {
                    echo '<option value="' . $evolution['name'] . '">' . $evolution['name'] . '</option>';
                }
                ?>
            </select>
            <select name="id_user" id="idUser">
                <?php
                $users = $data[0];
                foreach ($users as $user) {
                    echo '<option value="' . $user['id'] . '">' . $user['id'] . '</option>';
                }
                ?>
            </select>
            <button type="submit" name="submit" value="insert">Insert</button>
        </form>
    </main>

</body>

</html>