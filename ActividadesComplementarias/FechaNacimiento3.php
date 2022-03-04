<?php
    /**
     * 3. Escribe un programa que genere tres números aleatorios 
     * correspondientes a la fecha de nacimiento (día, mes, año) 
     * de una persona. Debes garantizar que la fecha generada es 
     * válida. El script mostrará en pantalla la fecha y una imagen 
     * con el signo del zodiaco de la persona.
     * 
     * @author Andrea Solís Tejada
     */
    $mes = rand(1, 12);
    $anno = rand(1891, getdate()["year"]);
    $dia;
    $zodiaco;
    $aries = "https://www.terra.cl/u/fotografias/m/2020/12/16/f1280x720-5024_136699_5050.jpg";
    $tauro = "https://images.clarin.com/2020/04/21/tauro-es-uno-de-los___sPGXbwf8Z_340x340__1.jpg";
    $geminis = "https://media.istockphoto.com/photos/gemini-zodiac-sign-abstract-night-sky-background-picture-id858072316?k=20&m=858072316&s=612x612&w=0&h=Gp7WcUIh24x7SuseE3p8l0jj5qNcgEY2WIusUtoZuW0=";
    $cancer = "https://estaticos-cdn.prensaiberica.es/clip/bedc9659-4a04-4f78-953f-89d2ab3bf583_16-9-discover-aspect-ratio_default_0.jpg";
    $leo = "https://us.123rf.com/450wm/igordabari/igordabari1609/igordabari160900202/63547552-leo-el-le%C3%B3n-constelaci%C3%B3n-del-zodiaco-leo-signo-corresponde-al-per%C3%ADodo-del-23-de-julio-al-23-de-agost.jpg?ver=6";
    $virgo = "https://e00-co-marca.uecdn.es/claro/assets/multimedia/imagenes/2021/03/18/16160717695695.jpg";
    $libra = "https://mui.today/__export/1601939313630/sites/mui/img/2020/10/05/libra-diario_x1x.jpg_375107944.jpg";
    $escorpio = "https://e00-co-marca.uecdn.es/claro/assets/multimedia/imagenes/2021/03/28/16169588077873.jpg";
    $sagitario = "https://images.clarin.com/2019/12/05/signo-de-sagitario-foto-shutterstock___Su4YJeYq_1200x630__1.jpg";
    $capricornio = "https://st1.uvnimg.com/68/8f/e84c330b482082e69ffe111e6251/capricornio-diario.jpg";
    $acuario = "https://frasesdelavida.com/wp-content/uploads/2021/02/frases-de-acuario.jpg";
    $piscis = "https://media.a24.com/p/bae046a247a1e56d10894407f3525773/adjuntos/296/imagenes/008/774/0008774033/1200x675/smart/piscis-horoscopojpg.jpg";

    if ($anno == getdate()["year"]) {
        if ($mes > getdate()["mon"]) {
            $mes = rand(1, (getdate()["mon"] - 1));
        } else if ($mes == getdate()["mon"]) {
            if ($dia > getdate()["mday"]) {
                $dia = rand(1, (getdate()["mday"] - 1));
            }
        }
    }

    switch ($mes) {
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            $dia = rand(1, 31);
            break;
        case 2:
            if ($anno % 4 == 0 && $anno % 100 != 0 || $anno % 400 == 0) {
                $dia = rand(1, 29);
            } else {
                $dia = rand(1, 28);
            }
            break;
        case 4: case 6: case 9: case 11:
            $dia = rand(1, 30);
            break;
    }
    echo "La fecha de nacimiento es el ".$dia."/".$mes."/".$anno."<br>";
    
    if (($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 20)) {
        $zodiaco = $aries;
    } else if (($mes == 4 && $dia >= 21) || ($mes == 5 && $dia <= 20)) {
        $zodiaco = $tauro;
    } else if (($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 21)) {
        $zodiaco = $geminis;
    } else if (($mes == 6 && $dia >= 22) || ($mes == 7 && $dia <= 22)) {
        $zodiaco = $cancer;
    } else if (($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22)) {
        $zodiaco = $leo;
    } else if (($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22)) {
        $zodiaco = $virgo;
    } else if (($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <=22)) {
        $zodiaco = $libra;
    } else if (($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 22)) {
        $zodiaco = $escorpio;
    } else if (($mes == 11 && $dia >= 23) || ($mes == 12 && $dia <= 21)) {
        $zodiaco = $sagitario;
    } else if (($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 20)) {
        $zodiaco = $capricornio;
    } else if (($mes == 1 && $dia >= 21) || ($mes == 2 && $dia <= 18)) {
        $zodiaco = $acuario;
    } else if (($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20)) {
        $zodiaco = $piscis;
    }

    echo <<<EOD
            <html>
            <body>
            <img src="$zodiaco"></img>
            </body>
            </html>
            EOD;
?>