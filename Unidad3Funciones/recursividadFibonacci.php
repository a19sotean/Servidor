<?php
    /**
     * Serie de Fibonacci.
     * 
     * @author Andrea Solís Tejada
     */

    function fibonacci($num) {
        $fibonacci = [0,1];
        if ($num == 1 || $num == 2) {
        } else {
           for ($i=2; $i <= $num ; $i++) { 
               $fibonacci[] = $fibonacci[$i-1] + $fibonacci[$i-2];
           }
           echo $fibonacci[$num]
    }
    fibonacci(10);
?>