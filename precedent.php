<?php

    session_start () ; 

    if ( $_SESSION["indice"] > 0 )
    {
        $_SESSION["indice"] -- ;    
    }

    header ( 'Location:afficher_les_employees.php' ) ;