<?php

function conectaDB()
{
    try {
        $dsn = "mysql:host=localhost;dbname=superheroes";
        $db =new PDO("mysql:host=localhost;dbname=superheroes",'root', '');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET NAMES utf8');
        return($db);
    }
    catch (PDOException $e) {
        echo "Error conexión";
        exit();
    }
}


/* 2. Uso de parámetros */
$db = conectaDB();
$campo = $_POST['busqueda'] ?? 'C%';
$velocidad = $_POST['velocidad'] ?? 3;
$sql = "SELECT * FROM superheroes WHERE nombre LIKE :nombre AND velocidad > :velocidad";

$consulta = $db->prepare($sql);
$aParametros = array(":nombre"=>$campo,":velocidad"=>$velocidad);
$consulta->execute($aParametros);
$resultado = $consulta->fetchAll();
$numeroRegistros = $consulta->rowCount();
echo "Listado de Superhéroes: " . $numeroRegistros . "</br>";
?>