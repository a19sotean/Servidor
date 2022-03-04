<?php
/**
 * 3. Script que, a partir del radio almacenado en una 
 * variable y la definición de la constante PI, calcule el
 * área del círculo y la longitud de la circunferencia. 
 * El debe mostrar valor de radio, longitud de la
 * circunferencia, área del círculo y dibujará un círculo
 * utilizando gráficos vectoriales.
 * @author Andrea Solís Tejada
 */
    $radio = 80;
    define("PI", pi());
    $area = PI * pow($radio, 2);
    $longitud = 2 * PI * $radio;

    echo "<p>Radio: $radio</p>";
    echo "<p>Longitud: $longitud</p>";
    echo "<p>Área : $area</p>";
    echo "<svg height='$area' width='$area'>
    <circle cx='100' cy='100' r='$radio' fill='purple'/>
    </svg>";
?>