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
        <div class="card grid columns-5">
            <span>title</span>
            <span>description</span>
            <span>done</span>
            <span>created-at</span>
            <span>actions</span>
        </div>
        <section>
            <?php
            foreach ($data as $request) {
                echo '<form action="/request/checkDone" method="post" class="card grid columns-5">';
                echo '<div>' . $request['title'] . '</div>';
                echo '<div>' . $request['description'] . '</div>';
                echo '<div>' . $request['done'] . '</div>';
                echo '<div>' . $request['created_at'] . '</div>';
                echo '<input type="number" name="id" id="id" value="' . $request['id'] . '" readonly hidden>';

                echo '<button type="submit" name="submit" value="checkDone" id="checkDone"';
                if ($request['done'] == 1) {
                    echo ' disabled';
                }
                echo '>SET DONE</button>';
                echo '</form>';
            }
            ?>
        </section>
    </main>
</body>

</html>