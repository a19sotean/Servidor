<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Delete Superhero</title>
</head>

<body>
    <header>
        <h1>Delete Superhero</h1>
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
            <input type="number" name="id" id="id" value="<?php echo $data['id'] ?>" readonly>
            <input type="text" name="name" id="name" value="<?php echo $data['name'] ?>" readonly>
            <input type="text" name="image" id="image" value="<?php echo $data['image'] ?>" readonly>
            <input type="text" name="evolution" id="evolution" value="<?php echo $data['evolution'] ?>" readonly>
            <input type="text" name="id_user" id="id_user" value="<?php echo $data['id_user'] ?>" readonly>
            <input type="datetime" name="createdAt" id="createdAt" value="<?php echo $data['created_at'] ?>" readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $data['updated_at'] ?>" readonly>
            <button type=" submit" name="submit" value="delete">Delete</button>
        </form>
    </main>

</body>

</html>