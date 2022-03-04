<?php
    /**
     * 4. Modifica la página inicial realizada, incluyendo una 
     * imagen de cabecera en función de la estación del año en
     * la que nos encontremos y un color de fondo en función
     * de la hora del día.
     * @author Andrea Solís Tejada
     */
    $mes = getdate()["mon"];
    $hora = getdate()["hours"];
    $imagenCabecera;
    $color;

    if ($mes >= 3 && $mes < 6) {
        $imagenCabecera = "https://e00-marca.uecdn.es/assets/multimedia/imagenes/2018/03/20/15215747794041.jpg";
    } else if ($mes >= 6 && $mes < 9) {
        $imagenCabecera = "https://concepto.de/wp-content/uploads/2018/08/verano1-e1535637769656.jpg";
    } else if ($mes >= 9 && $mes < 12) {
        $imagenCabecera = "https://media.wsimag.com/attachments/acf3ecd10ac75b28136928702ab0ec71c2e78edf/store/fill/1090/613/30d281d61fd27a5f208a5d36f7be929fc16754ae62c03598c8cc51a7609c/Hojas-por-el-suelo-en-un-dia-de-otono.jpg";
    } else {
        $imagenCabecera = "https://estaticos.muyinteresante.es/media/cache/1000x460_thumb/uploads/images/gallery/58738fb85cafe829af8b456f/invierno1_0.jpg";
    }

    if ($hora >= 8 && $hora < 12) {
        $color = '#FBC05D';
    } else if ($hora >= 12 && $hora < 18) {
        $color = '#b2dafa';
    } else if ($hora >= 18 && $hora < 21) {
        $color = '#c59fcb';
    } else {
        $color = '#1F456E';
    }

    echo <<<EOD
    <style>
    body {
        background-color: $color;
    }
    </style>
    EOD;

    echo <<<EOD
    <html>
    <header>
    <img src="$imagenCabecera"></img>
    </header>
    <body>
    <h1>Nombre</h1>
    <h2>Andrea Solís Tejada</h2>
    <img src="https://i.imgur.com/ZfJZQgX.jpg"></img>
    <h2>Descripción</h2>
    <p>Mi nombre es Andrea, estudio en segundo de DAW y amo a mi gato.</p>
    </body>
    </html>
    EOD;
?>