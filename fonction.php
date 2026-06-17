


















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
        $result = array () ;
        while ( $line = mysqli_fetch_assoc ( $req ) ) 
        {
            $result[] = $line ;
        }
        mysqli_free_result ( $req ) ;
        return $result ;
    }


function get_all_departments_and_manager_s_name_and_numbre ()
{
    // Cette requête récupère le manager actuel (to_date > CURRENT_DATE)
    // et compte le nombre total d'employés uniques (COUNT DISTINCT) dans le département
    $sql = "SELECT 
                d.dept_no, 
                d.dept_name,
                m_emp.first_name, 
                m_emp.last_name,
                COUNT(DISTINCT de.emp_no) AS nombre_employee
            FROM departments d
            JOIN dept_manager dm ON d.dept_no = dm.dept_no AND dm.to_date > CURRENT_DATE
            JOIN employees m_emp ON dm.emp_no = m_emp.emp_no
            JOIN dept_emp de ON d.dept_no = de.dept_no
            GROUP BY 
                d.dept_no, 
                d.dept_name, 
                m_emp.first_name, 
                m_emp.last_name";

    $req = mysqli_query(dbconnect(), $sql);
    
    // Sécurité au cas où la requête échouerait
    if (!$req) {
        die("Erreur SQL : " . mysqli_error(dbconnect()));
    }

    $res = array();
    while ($donnee = mysqli_fetch_assoc($req)) 
    {
        $res[] = $donnee;
    }
    mysqli_free_result($req);
    return $res;
}


function get_n_employee ()
{
        $sql = " SELECT count(employees.emp_no) as ne FROM employees " ;
        echo $sql ;
        $req = mysqli_query(dbconnect(), $sql ) ;
        $result = array () ;
        while ( $line = mysqli_fetch_assoc ( $req ) ) 
        {
            $result[] = $line ;
        }
        mysqli_free_result ( $req ) ;
        return $result ;
}

function get_n_employee_m ()
{
        $sql = " SELECT count(employees.emp_no) as ne FROM employees WHERE gender = 'M' " ;
        echo $sql ;
        $req = mysqli_query(dbconnect(), $sql ) ;
        $result = array () ;
        while ( $line = mysqli_fetch_assoc ( $req ) ) 
        {
            $result[] = $line ;
        }
        mysqli_free_result ( $req ) ;
        return $result ;
}

function get_n_employee_f ()
{
        $sql = " SELECT count(employees.emp_no) as ne FROM employees WHERE gender = 'F' " ;
        echo $sql ;
        $req = mysqli_query(dbconnect(), $sql ) ;
        $result = array () ;
        while ( $line = mysqli_fetch_assoc ( $req ) ) 
        {
            $result[] = $line ;
        }
        mysqli_free_result ( $req ) ;
        return $result ;
}

function get_salaire_moyenn_pour_chaque_emploi ()
{
        $sql = " SELECT 
    titles.title AS emploi, 
    ROUND(AVG(salaries.salary), 2) AS salaire_moyen
FROM titles
JOIN salaries ON titles.emp_no = salaries.emp_no
GROUP BY 
    titles.title; " ;
        echo $sql ;
        $req = mysqli_query(dbconnect(), $sql ) ;
        $result = array () ;
        while ( $line = mysqli_fetch_assoc ( $req ) ) 
        {
            $result[] = $line ;
        }
        mysqli_free_result ( $req ) ;
        return $result ;
}

function determiner_l_emploi_le_plus_long ( $id_employe )
{
    $sql = "SELECT 
                title AS emploi,
                DATEDIFF(
                    CASE WHEN to_date > CURRENT_DATE THEN CURRENT_DATE ELSE to_date END, 
                    from_date
                ) AS duree_jours
            FROM titles
            WHERE emp_no = %d
            ORDER BY duree_jours DESC
            LIMIT 1";
            
    $sql = sprintf($sql, $id_employe);
    
    $req = mysqli_query(dbconnect(), $sql);
    
    if (!$req) {
        die("Erreur SQL : " . mysqli_error(dbconnect()));
    }
    
    $result = array();
    while ($line = mysqli_fetch_assoc($req)) 
    {
        $result[] = $line;
    }
    mysqli_free_result($req);
    
    return $result; // Retourne un tableau contenant l'emploi le plus long et sa durée
}





?>
