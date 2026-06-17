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

    function get_all_employees_in_dep ( $depart , $i )
    {
        $sql = " SELECT * FROM employees WHERE emp_no IN  ( SELECT emp_no FROM dept_emp WHERE dept_no = '%s' AND ( from_date < current_date AND current_date < to_date )  ) LIMIT %d , 20  " ;
        $sql = sprintf ( $sql , $depart , ( $i * 20 ) ) ;
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

    function get_employee ( $id )
    {
        $sql = " SELECT * FROM employees WHERE emp_no = %d " ;
        $sql = sprintf ( $sql , $id ) ;
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

    function get_employee_avec_salaire_et_emploi ( $id ) 
    {
        $sql = " SELECT s.salary, t.title FROM salaries s join titles t on s.emp_no = t.emp_no where s.emp_no= %d " ;
        $sql = sprintf($sql, $id ) ;
        echo $sql ;
        $req = mysqli_query(dbconnect(), $sql ) ;
        $result = array();
        while ( $line = mysqli_fetch_assoc ( $req ) ) 
        {
            $result[] = $line ;
        }
        mysqli_free_result ( $req ) ;
        return $result ;
    }


    function recherche_emploie ( $nom_departement , $nom_employee , $age_min , $age_max )
    {
        $sql = " SELECT * FROM employees JOIN dept_manager ON employees.emp_no = dept_manager.emp_no JOIN departments ON departments.dept_no = dept_manager.dept_no WHERE employees.first_name LIKE '%%%s%%' AND departments.dept_name LIKE '%%%s%%' AND ( current_date - employees.birth_date ) > %d AND ( current_date - employees.birth_date ) < %d  " ;
        $sql = sprintf($sql, $nom_employee , $nom_departement , $age_min , $age_max ) ;
        echo $sql ;
        $req = mysqli_query(dbconnect(), $sql ) ;
        $result = array();
        while ( $line = mysqli_fetch_assoc ( $req ) ) 
        {
            $result[] = $line ;
        }
        mysqli_free_result ( $req ) ;
        return $result ;
    }
