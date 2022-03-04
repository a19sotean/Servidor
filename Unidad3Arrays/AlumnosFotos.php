<?php
    /**
     * Array que contiene los alumnos de la clase y sus fotos.
     * Muestra aleatoriamente un nombre con su foto.
     * 
     * @author Andrea Solís Tejada
     */
    $alumno;
    $foto;
    $alumnos = array(  
               "Jesus Díaz Rivas",
               "Manuel Brito Guerrero",
               "Joaquín Baena Salas",
               "Laura Hidalgo Rivera",
               "Tomas Hidalgo Martin", 
               "Carlos Hidalgo Risco",
               "Daniel Ayala Cantador",
               "Javier Cebrián Muñoz",
               "Javier Fernández Rubio",
               "Rubén Ramírez Rivera",
               "David Pérez Ruiz",
               "Alejandro Rabadán Rivas",
               "David Rosas Alcatraz",
               "Guillermo Tamajon Hernandez",
               "Sergio Vera Jurado",
               "Javier Salazar Almagro",
               "Manuel Solar Bueno",
               "Andrea Solís Tejada",
               "Juan Manuel González Prófumo",
               "Rafael Yuste Barrera",
               "Javier Epifanio López",
               "Carlos Chaves Hernández",
               "Virginia Ordoño Bernier");
    
    $alumno = $alumnos[rand(0, 22)];
    echo "<h1>".$alumno."</h1>";

    if ($alumno == $alumnos[0]) {
        $foto = "img\JesusDiazRivas.jpg";
    } else if ($alumno == $alumnos[1]) {
        $foto = "img\ManuelBrito.jpg";
    } else if ($alumno == $alumnos[2]) {
        $foto = "img\JoaquinBaenaSalas.jpg";
    } else if ($alumno == $alumnos[3]) {
        $foto = "img\LauraHidalgoRivera.jpg";
    } else if ($alumno == $alumnos[4]) {
        $foto = "img\TomasHidalgoMartin.jpg";
    } else if ($alumno == $alumnos[5]) {
        $foto = "img\CarlosHidalgoRisco.png";
    } else if ($alumno == $alumnos[6]) {
        $foto = "img\DanielAyalaCantador.jpg";
    } else if ($alumno == $alumnos[7]) {
        $foto = "img\JavierCebrianMuñoz.jpeg";
    } else if ($alumno == $alumnos[8]) {
        $foto = "img\javierfernandezrubio.jpeg";
    } else if ($alumno == $alumnos[9]) {
        $foto = "img\RubenRamirezRivera.jpeg";
    } else if ($alumno == $alumnos[10]) {
        $foto = "img\DavidPerezRuiz.png";
    } else if ($alumno == $alumnos[11]) {
        $foto = "img\AlejandroRabadanRivas.jpg";
    } else if ($alumno == $alumnos[12]) {
        $foto = "img\DavidRosasAlcaraz.jpg";
    } else if ($alumno == $alumnos[13]) {
        $foto = "img\GuillermoTamajonHernandez.jpg";
    } else if ($alumno == $alumnos[14]) {
        $foto = "img\sergiovera.png";
    } else if ($alumno == $alumnos[15]) {
        $foto = "img\JavierSalazarAlmagro.jpg";
    } else if ($alumno == $alumnos[16]) {
        $foto = "img\ManuelSolarBueno.jpg";
    } else if ($alumno == $alumnos[17]) {
        $foto = "img\AndreaSolisTejada.jpeg";
    } else if ($alumno == $alumnos[18]) {
        $foto = "img\JuanManuelGonzalezProfumo.jpg";
    } else if ($alumno == $alumnos[19]) {
        $foto = "img\RafaelYuste.png";
    } else if ($alumno == $alumnos[20]) {
        $foto = "img\JavierEpifanioLopez.jpg";
    } else if ($alumno == $alumnos[21]) {
        $foto = "img\CarlosChaves.jpg";
    } else if ($alumno == $alumnos[22]) {
        $foto = "img\VirginiaOrdoño.jpg";
    }

    echo <<<EOD
            <body>
            <img src="$foto" width="300" height="200"></img>
            </body>
            EOD;
?>