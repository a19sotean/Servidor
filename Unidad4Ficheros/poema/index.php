<?php
    // Normal
    /**
     * echo "<b>Normal</b>";
     * $file = fopen("poema.txt","r") or exit("Unable to open file!");
     * while (!feof($file)) {
     *     echo fgets($file)."<br/>";
     * }
     * fclose($file);
     */
 
    // Se lee caracter a caracter
    /**
     * echo "<b>Carácter a carácter</b>"
     * $file = fopen("poema.txt","r") or exit("Unable to open file!");
     * while (!feof($file)) {
     *    echo fgetc($file);
     * }
     * fclose($file);
     */

    // Con operador ternario
    /**
     * echo "<b>Con operador ternario</b>";
     * $file = fopen("poema.txt","r") or exit("Unable to open file!");
     * while (!feof($file)) {
     *     $caracter = fgetc($file);
     *     ($caracter == "\n") ? print ("<br/>") : print ($caracter);
     * }
     * fclose($file);
     */

    // Lee el número de caracteres que se le indica v1
    $file = fopen("poema.txt","r") or exit("Unable to open file!");
    $buffer = fread($file, filesize("poema.txt"));
    $buffer = str_replace("\n","</br>", $buffer);
    echo $buffer;
    fclose($file);

    // Lee el número de caracteres que se le indica v2
    /**
     * $file = fopen("poema.txt","r") or exit("Unable to open file!");
     * $buffer = fread($file, filesize("poema.txt"));
     * $lista = explode("\n", $buffer);
     * foreach ($lista as $linea) {
     *     echo $linea."</br>";
     * }
     * fclose($file);
     */
?>