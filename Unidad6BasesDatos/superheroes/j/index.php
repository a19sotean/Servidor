<?php
require '../conBD.php';
$db = conectaDB();

if ($_GET) {
    if ($_GET['modifiedName']) {

        $pstm = $db->prepare("UPDATE superheroes SET nombre = :nombre WHERE id = :id");
        $id = $_GET['id'];
        $nombre = $_GET['modifiedName'];
        $pstm->bindParam(':id', $id);
        $pstm->bindParam(':nombre', $nombre);
        $pstm->execute();
    }
}

?>
<form />
<input type='text' name='superhero' />
<input type='submit' value='Send query' />
</form>
<?php

$pstm = $db->prepare("SELECT * FROM superheroes");
$pstm->execute();
$result = $pstm->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $key => $superHero) {
    echo $superHero['nombre'] . "<a href='./del.php?id={$superHero['id']}' >DEL </a>" . "<a href='./edit.php?id={$superHero['id']}&name={$superHero['nombre']}' >EDIT </a>" . "<br>";
}
