<?php
    /**
     * 3d. Array que almacena y muestra los verbos irregulares en 
     * inglés.
     * 
     * @author Andrea Solís Tejada
     */
    $verbos = array(
        array("infinitivo" => "be", "pasado" => "was/were", "participio" => "been", "traduccion" => "ser,estar"),
        array("infinitivo" => "become", "pasado" => "became", "participio" => "become", "traduccion" => "convertirse en"),
        array("infinitivo" => "begin", "pasado" => "began", "participio" => "begun", "traduccion" => "empezar"),
        array("infinitivo" => "bite", "pasado" => "bit", "participio" => "bitten", "traduccion" => "morder"),
        array("infinitivo" => "blow", "pasado" => "blew", "participio" => "blown", "traduccion" => "soplar"),
        array("infinitivo" => "break", "pasado" => "broke", "participio" => "broken", "traduccion" => "romper"),
        array("infinitivo" => "bring", "pasado" => "brought", "participio" => "brought", "traduccion" => "llevar,traer"),
        array("infinitivo" => "build", "pasado" => "built", "participio" => "built", "traduccion" => "construir"),
        array("infinitivo" => "buy", "pasado" => "bought", "participio" => "bought", "traduccion" => "comprar"),
        array("infinitivo" => "can", "pasado" => "could", "participio" => "been able", "traduccion" => "poder"),
        array("infinitivo" => "catch", "pasado" => "caught", "participio" => "caught", "traduccion" => "coger,atrapar"),
        array("infinitivo" => "choose", "pasado" => "chose", "participio" => "chosen", "traduccion" => "elegir"),
        array("infinitivo" => "come", "pasado" => "came", "participio" => "come", "traduccion" => "venir"),
        array("infinitivo" => "cost", "pasado" => "cost", "participio" => "cost", "traduccion" => "costar"),
        array("infinitivo" => "cut", "pasado" => "cut", "participio" => "cut", "traduccion" => "cortar"),
        array("infinitivo" => "do", "pasado" => "did", "participio" => "done", "traduccion" => "hacer"),
        array("infinitivo" => "draw", "pasado" => "drew", "participio" => "drawn", "traduccion" => "dibujar"),
        array("infinitivo" => "drink", "pasado" => "drank", "participio" => "drunk", "traduccion" => "beber"),
    );

    foreach ($verbos as $verbo) {
        echo $verbo["infinitivo"]." - ";
        echo $verbo["pasado"]." - ";
        echo $verbo["participio"]." - ";
        echo $verbo["traduccion"];
        echo "<br/>";
    }
?>