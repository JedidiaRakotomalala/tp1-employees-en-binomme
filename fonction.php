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

    function get_all_departments_and_manager_s_name ()
    {
        $sql = " SELECT departments.dept_no , departments.dept_name , employees.first_name , employees.last_name FROM departments JOIN dept_manager ON departments.dept_no = dept_manager.dept_no JOIN employees ON dept_manager.emp_no = employees.emp_no WHERE dept_manager.to_date > current_date " ;
        $req = mysqli_query ( dbconnect () , $sql ) ;
        echo $sql ;
        $res = array () ;
        while ( $donnee = mysqli_fetch_assoc ( $req ) ) 
        {
            $res[] = $donnee ;
        }
        mysqli_free_result ( $req ) ;
        return $res ;
    }
?>