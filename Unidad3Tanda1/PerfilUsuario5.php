<?php
    /**
     * 5. Script que muestre una lista de enlaces en función
     * del perfil de usuario:
     * Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4
     * Perfil Usuario: Pagina1, Pagina2
     * @author Andrea Solís Tejada
     */
    $perfil = "admin";

    switch ($perfil) {
        case 'admin':
            print '<li><a href="./adminPagina1.html">Página 1</a><br></li>';
            print '<li><a href="./adminPagina2.html">Página 2</a><br></li>';
            print '<li><a href="./adminPagina2.html">Página 3</a><br></li>';
            print '<li><a href="./adminPagina4.html">Página 4</a><br></li>';
            break;
        case 'usuario':
            print '<li><a href="./usuarioPagina1.html">Página 1</a><br></li>';
            print '<li><a href="./usuarioPagina2.html">Página 2</a><br></li>';
            break;
        default:
            echo "El perfil no se ha introducido correctamente";
            break;
    }
?>