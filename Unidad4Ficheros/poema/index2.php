<?php
    /**
     * Si el fichero output.txt existe, lo mete en un array e imprime el número que hay en el fichero,
     * después se va sumando un número y en el fichero también se cambia, si no existe, crea el fichero
     * y le añade el valor 1.
     */
    $filename = 'output.txt';
    if (file_exists($filename))   {
        $count = file('output.txt');
        $count[0] ++;
        $fp = fopen("output.txt", "w");
        fputs ($fp, "$count[0]");
        fclose ($fp);
        echo $count[0];
    }
    else {
        $fh = fopen("output.txt", "w");
        if($fh==false) die("unable to create file");
        fputs ($fh, 1);
        fclose ($fh);
        $count = file('output.txt');
        echo $count[0];
    }
?>