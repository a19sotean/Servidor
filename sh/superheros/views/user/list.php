<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Users</title>
</head>

<body>
    <header>
        <h1>Users</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <section>
            <?php echo '<a href="/user/add' . '" class="add">NEW</a>'; ?>
            <div class="card grid columns-6">
                <span>id</span>
                <span>user</span>
                <span>password</span>
                <span>created-at</span>
                <span>updated-at</span>
                <span>actions</span>
            </div>
            <?php
            foreach ($data as $user) {
                echo '<form action="" method="post" class="card grid columns-6">';
                echo '<input type="number" name="id" id="id" value="' . $user['id'] . '" readonly>';
                echo '<input type="text" name="user" id="user" value="' . $user['user'] . '" readonly>';
                echo '<input type="text" name="psw" id="psw" value="' . $user['psw'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $user['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $user['updated_at'] . '" readonly>';

                echo '<div>';
                echo '<a href="/user/edit/' . $user['id'] . '" class="update">EDIT</a>';
                echo '<a href="/user/del/' . $user['id'] . '" class="delete">DELETE</a>';
                echo '</div>';

                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>