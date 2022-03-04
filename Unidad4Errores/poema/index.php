<?php
    /**
     * Script para el manejo de una excepción.
     * 
     * @author Andrea Solís Tejada
     */
    $fileName = "poema1.txt";
    try {
        if (!file_exists($fileName)) {
            throw new Exception("Fichero no encontrado");
        }
        $file = fopen($fileName,"r");
        while (!feof($file)) {
            echo fgets($file). "<br/>";
        }
        $file =fclose($file);
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
?>