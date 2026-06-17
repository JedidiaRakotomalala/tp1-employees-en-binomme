<?php
    function dbconnect ()
    {
        static $connect = null ;
        if ($connect === null ) 
        {
            $connect = mysqli_connect ( "localhost" , "root" , "" , "employees" ) ;
            if ( ! $connect ) 
            {
                die('Erreur de connexion a la base de donnees : ' . mysqli_connect_error () ) ;
            }
            mysqli_set_charset ( $connect , 'utf8mb4' ) ;
        }
        return $connect ;
    }

    function get_all_departments ()
    {
        $sql = " SELECT * FROM departments " ;
        echo $sql ;
        $req = mysqli_query ( dbconnect () , $sql ) ;
        $res = array () ;
        while ( $donnee = mysqli_fetch_assoc ( $req ) ) 
        {
            $res[] = $donnee ;
        }
        mysqli_free_result ( $req ) ;
        return $res ;
    }
?>