<?php
    include("constantes.php");
    include("Superheroe.php");

    $datos = array(
                    "nombre"=>"Bruja escarlata",
                    "velocidad"=>5
                );

    echo "Añadimos un registro<br/>";

    $sh = Superheroe::getInstancia();
    $sh->set($datos);


?>