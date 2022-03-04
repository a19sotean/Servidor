<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Delete Citizen</title>
</head>

<body>
    <header>
        <h1>Delete Citizen</h1>
    </header>
    <main>
        <?php include "../views/nav.php"; ?>
        <div class="card grid columns-7">
            <span>id</span>
            <span>name</span>
            <span>email</span>
            <span>id-user</span>
            <span>created-at</span>
            <span>updated-at</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-7">
            <input type="number" name="id" id="id" value="<?php echo $data['id'] ?>" readonly>
            <input type="text" name="name" id="name" value="<?php echo $data['name'] ?>" readonly>
            <input type="text" name="email" id="email" value="<?php echo $data['email'] ?>" readonly>
            <input type="text" name="idUser" id="idUser" value="<?php echo $data['idUser'] ?>" readonly>
            <input type="datetime" name="createdAt" id="createdAt" value="<?php echo $data['created_at'] ?>" readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $data['updated_at'] ?>" readonly>
            <button type=" submit" name="submit" value="delete">Delete</button>
        </form>
    </main>

</body>

</html>