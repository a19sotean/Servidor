<?php
    include("constantes.php");
    include("Superheroe.php");

    // Persistiendo desde la entidad.
    $sh = new Superheroe();
    // $sh->setNombre("Iron Man");
    // $sh->setVelocidad("6");
    // $sh->setEntity();
    // $sh->setNombre("Pepito");
    // $sh->setVelocidad("8");
    // $sh->editEntity();
    // $sh->delete(7);
    $sh->get(2);
    //var_dump($sh);
    echo $sh->getNombre();
?>