<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Edit Citizen</title>
</head>

<body>
    <header>
        <h1>Edit Citizen</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
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

            <?php
            $citizen = $data[0];
            $users = $data[1];
            ?>
            <input type="number" name="id" id="id" value="<?php echo $citizen['id'] ?>" readonly>
            <input type="text" name="name" id="name" value="<?php echo $citizen['name'] ?>">
            <input type="text" name="email" id="email" value="<?php echo $citizen['email'] ?>">
            <select name="idUser" id="idUser" value="<?php echo $citizen['idUser'] ?>">
                <?php
                foreach ($users as $user) {
                    echo '<option value="volvo">' . $user['id'] . '</option>';
                }
                ?>
            </select>
            <input type=" datetime" name="createdAt" id="createdAt" value="<?php echo $citizen['created_at'] ?> " readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $citizen['updated_at'] ?>" readonly>
            <button type="submit" name="submit" value="update">Update</button>
        </form>
    </main>

</body>

</html>