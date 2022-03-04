<?php 
require 'conBD.php';

$db = conectaDB();
if ($_GET['id']) {
    $pstm = $db->prepare("DELETE FROM superheroes WHERE id = :id");
    $id = $_GET['id'];
    $pstm->bindParam(':id', $id);
    $pstm->execute();
    header("location:index.php");
}