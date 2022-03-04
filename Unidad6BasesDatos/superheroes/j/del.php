<?php 
require '../conBD.php';
//delete superhero from db based on id
$db = conectaDB();
if ($_GET['id']) {
    $pstm = $db->prepare("DELETE FROM superheroes WHERE id = :id");
    $id = $_GET['id'];
    $pstm->bindParam(':id', $id);
    $pstm->execute();
    header("location:index.php");
}

// $pstm = $db->prepare("DELETE FROM superheroes WHERE id = :id");
// $pstm->bindParam(':id', $GET['id']);
// $pstm->execute();
