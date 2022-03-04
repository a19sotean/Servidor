<?php
    /**
     * 3. Tablas de multiplicar del 1 al 10. Aplicar estilos en 
     * filas/columnas.
     * @author Andrea Solís Tejada
     */

    echo <<<EOD
    <html>
    <body>
    <table width="100%" height="100%" border="1" cellpadding="15" cellspacing="0" align="center"
    <tr>
    EOD;

    for ($i = 1; $i <= 10; $i++) {
        print "<th bgcolor='#ffda9e'>tabla del ".$i."</th>";
    }
    echo "</tr>";

    for ($i = 1; $i <= 10; $i++) {
        if ($i % 2 == 0) {
            echo "<tr bgcolor='#b2e2f2'>";
        } else {
            echo "<tr bgcolor='#c5c6c8'>";
        }
        for ($j = 1; $j <= 10; $j++) {
            print "<td>".($j*$i)."</td>";
        }
        echo "</tr>";
    }

    echo <<<EOD
    </body>
    </table>
    </html>
    EOD;
?>