<?php

    session_start () ; 

        $_SESSION["indice"] ++ ;    

    header ( 'Location:afficher_les_employees.php' ) ;


    ?>