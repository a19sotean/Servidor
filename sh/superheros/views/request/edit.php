<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Edit Request</title>
</head>

<body>
    <header>
        <h1>Edit Request</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card grid columns-9">
            <span>id</span>
            <span>title</span>
            <span>description</span>
            <span>done</span>
            <span>id-superhero</span>
            <span>id-citizen</span>
            <span>created-at</span>
            <span>updated-at</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-9">
            <?php $request = $data[0] ?>
            <input type="number" name="id" id="id" value="<?php echo $request['id'] ?>" readonly>
            <input type="text" name="title" id="title" value="<?php echo $request['title'] ?>">
            <input type="text" name="description" id="description" value="<?php echo $request['description'] ?>">
            <input type="text" name="done" id="done" value="<?php echo $request['done'] ?>">
            <select name="id_superhero" id="id_superhero" value="<?php echo $request['id_superhero'] ?>">
                <?php

                $superheroes = $data[1];
                foreach ($superheroes as $superhero) {
                    echo '<option value="' . $superhero['id'] . '">' . $superhero['id'] . '</option>';
                }
                ?>
            </select>
            <select name="id_citizen" id="id_citizen" value="<?php echo $request['id_citizen'] ?>">
                <?php
                $citizens = $data[2];
                foreach ($citizens as $citizen) {
                    echo '<option value="' . $citizen['id'] . '">' . $citizen['id'] . '</option>';
                }
                ?>
            </select>
            <input type="datetime" name="createdAt" id="createdAt" value="<?php echo $request['created_at'] ?>" readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $request['updated_at'] ?>" readonly>
            <button type="submit" name="submit" value="update">Update</button>
        </form>
    </main>

</body>

</html>