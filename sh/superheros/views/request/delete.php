<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Delete Request</title>
</head>

<body>
    <header>
        <h1>Delete Request</h1>
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
            <input type="number" name="id" id="id" value="<?php echo $data['id'] ?>" readonly>
            <input type="text" name="title" id="title" value="<?php echo $data['title'] ?>" readonly>
            <input type="text" name="description" id="description" value="<?php echo $data['description'] ?>" readonly>
            <input type="text" name="done" id="done" value="<?php echo $data['done'] ?>" readonly>
            <input type="number" name="id_superhero" id="id_superhero" value="<?php echo $data['id_superhero'] ?>" readonly>
            <input type="number" name="id_citizen" id="idCitizen" value="<?php echo $data['id_citizen'] ?>" readonly>
            <input type="datetime" name="createdAt" id="createdAt" value="<?php echo $data['created_at'] ?>" readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $data['updated_at'] ?>" readonly>
            <button type=" submit" name="submit" value="delete">Delete</button>
        </form>
    </main>

</body>

</html>