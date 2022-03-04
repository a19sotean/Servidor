<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Edit Superhero</title>
</head>

<body>
    <header>
        <h1>Edit Superhero</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
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
        <form action="" method="post" class="card grid columns-8">
            <?php $superhero = $data[0]; ?>
            <input type="number" name="id" id="id" value="<?php echo $superhero['id'] ?>" readonly>
            <input type="text" name="name" id="name" value="<?php echo $superhero['name'] ?>">
            <input type="text" name="image" id="image" value="<?php echo $superhero['image'] ?>">
            <select name="evolution" id="evolution" value="<?php echo $superhero['evolution'] ?>">
                <?php

                $evolutions = $data[2];
                foreach ($evolutions as $evolution) {
                    echo '<option value="' . $evolution['name'] . '">' . $evolution['name'] . '</option>';
                }
                ?>
            </select>
            <select name="id_user" id="id_user" value="<?php echo $citizen['id_user'] ?>">
                <?php
                $users = $data[1];
                foreach ($users as $user) {
                    echo '<option value="' . $user['id'] . '">' . $user['id'] . '</option>';
                }
                ?>
            </select>
            <input type="datetime" name="createdAt" id="createdAt" value="<?php echo $superhero['created_at'] ?> " readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $superhero['updated_at'] ?>" readonly>
            <button type="submit" name="submit" value="update">Update</button>
        </form>
    </main>

</body>

</html>