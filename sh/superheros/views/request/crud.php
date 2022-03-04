<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Requests</title>
</head>

<body>
    <header>
        <h1>Requests</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <?php echo '<a href="/request/add' . '" class="add">NEW</a>'; ?>
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
        <section>
            <?php
            foreach ($data as $request) {
                echo '<form action="" method="post" class="card grid columns-9">';
                echo '<input type="number" name="id" id="id" value="' . $request['id'] . '" readonly>';
                echo '<input type="text" name="title" id="title" value="' . $request['title'] . '" readonly>';
                echo '<input type="text" name="description" id="description" value="' . $request['description'] . '" readonly>';
                echo '<input type="text" name="done" id="done" value="' . $request['done'] . '" readonly>';
                echo '<input type="text" name="id_superhero" id="id_superhero" value="' . $request['id_superhero'] . '" readonly>';
                echo '<input type="text" name="id_citizen" id="id_citizen" value="' . $request['id_citizen'] . '" readonly>';
                echo '<input type="datetime" name="createdAt" id="createdAt" value="' . $request['created_at'] . '" readonly>';
                echo '<input type="datetime" name="updatedAt" id="updatedAt" value="' . $request['updated_at'] . '" readonly>';
                echo '<div>';
                echo '<a href="/request/edit/' . $request['id'] . '" class="update">EDIT</a>';
                echo '<a href="/request/del/' . $request['id'] . '" class="delete">DELETE</a>';
                echo '</div>';
                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>