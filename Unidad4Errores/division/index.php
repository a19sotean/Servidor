<?php
    /**
     * Provocamos una división entre 0
     */
    $divisor = 0;
    $n = 100;
    try {
        echo $n % $divisor;
    //} catch (Error $e) {
    } catch (ArithmeticError $e) { // Tipo de error
        echo $e->getMessage();
        die();
    }
?>