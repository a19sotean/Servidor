<?php
/**
 * 6. Script que cargue las siguientes variables:
 * $x=10;
 * $y=7;
 * y muestre
 * 10 + 7 = 17
 * 10 - 7 = 3
 * 10 * 7 = 70
 * 10 / 7 = 1.4285714285714
 * 10 % 7 = 3
 * @author Andrea Solís Tejada
 */
    $x = 10;
    $y = 7;
    print "<p>";
    printf ("%s+%s=%d",$x,$y, $x+$y);
    print "</p>";
    print "<p>";
    printf ("%s-%s=%d",$x,$y, $x-$y);
    print "</p>";
    print "<p>";
    printf ("%s*%s=%d", $x,$y, $x*$y);
    print "</p>";
    print "<p>";
    printf ("%s/%s=%f", $x,$y, $x/$y);
    print "</p>";
    print "<p>";
    printf ("%s%%%s=%d", $x,$y, $x%$y);
    print "</p>";
?>