<?php
    /**
     * 2. Carga en variables mes y año e indica el número de días 
     * del mes. Utiliza la estructura de control switch.
     * @author Andrea Solís Tejada
     */
    $mes = "febrero";
    $anno = 2021;
    $dias = 0;

    switch ($mes) {
        case 'enero':
        case 'marzo':
        case 'mayo':
        case 'julio':
        case 'agosto':
        case 'octubre':
        case 'diciembre':
            $dias = 31;
            break;
        case 'febrero':
            if ($anno % 4 == 0 && $anno % 100 != 0 || $anno % 400 == 0) {
                $dias = 29;
            } else {
                $dias = 28;
            }
            break;
        case 'abril':
        case 'junio':
        case 'septiembre':
        case 'noviembre':
            $dias = 30;
            break;
        default:
            echo "No has introducido un mes correcto.";
            break;
    }
    print "El mes: ".$mes." del año: ".$anno." tiene ".$dias." días";
?>