








    <!-- TP employee -->




Creation la page "fonction.php" :

        . dbconnect () : 
            - $connect : mysqli_connect ( "localhost" , "root" , "" , "employees" ) ;
            - Verification 
            - return $connect ;

        . get_all_departments () :
            - $sql = " SELECT * FROM departments " ;
            - mysqli_query + mysqli_fetch_assoc ;
            - return $tab_dep ;


Creation de la page "index.php" : afficher la liste de toutes les departements . 

        . php :
            - include ( "fonction.php" ) ;
            - appeler get_all_departments () ;

        - html :
            - html5 
            - affichage des informations dans un tableau .


Revenir sur "fonction.php" :

        . get_all_departments_and_manager_s_name () :
            - $sql = " SELECT departments.dept_no , departments.dept_name , employees.first_name , employees.last_name FROM departments JOIN dept_manager ON departments.dept_no = dept_manager.dept_no JOIN employees ON dept_manager.emp_no = employees.emp_no WHERE dept_manager.to_date > current_date " ;
            - return $tab_dep_et_manager ;


Revenir sur "index.php" : affiche le nom du manager en cours 

        . php :
            - appeler la fonction get_all_departments_and_manager_s_name () ;

        . html :
            - afficher le resultat dans un tableau .


Revenir sur "fonction.php" :

        . get_all_employees_in_dep ( num_dep ) :
            - $sql = " SELECT * FROM employees WHERE emp_no IN  ( SELECT emp_no FROM dept_emp WHERE dept_no = '%s' AND ( from_date < current_date AND current_date < to_date )  ) " ;
            - return $employee_dans_dep ;


Revenir sur "index.php" : Mettre un lien sur chaque ligne de département pour afficher dans une autre page la liste des employés de ce département .

        . html : 
            - creer un lien sur le numero de departement :  <a href="afficher_les_employees.php?id_dep=<?php echo $tout_les_departements_et_manager[$i]["dept_no"] ; ?>"><?php echo $tout_les_departements_et_manager[$i]["dept_no"] ; ?></a> 
            - lien vers : afficher_les_employees.php et envoie le numero du departement .


Creation de la page "afficher_les_employees.php" :  sert a afficher toutes les details de chaque employee dans un departement 

        . php :
            - include ( "fonction.php" ) ;
            - prendre par GET le numero du departement .
            - appeler la fonction get_all_employees_in_dep ( num_dep ) .
            
        . html : 
            - afficher dans un tableau toutes les employees dans le departement .


Revenir sur "fonction.php" :

        . get_employee ( $id ) :
            - $sql = " SELECT * FROM employees WHERE emp_no = %d " ;
            - return $employe_detail ;

        
Revenir sur la page "afficher_les_employees.php" : Lorsqu'on clique sur un employé, on doit afficher la fiche de l'employé .

        . html :
            - ajouter un lien sur le numero de chaque enployee ;
            - Lien : <a href="fiche_employee.php?id_empl=<?php echo $tout_les_employees[$i]["emp_no"] ; ?>"><?php echo $tout_les_employees[$i]["emp_no"] ; ?></a>
            - Envoyer dans fiche_employee.php et evoyer son numero .

    
Creation de la page fiche_employee.php : le fiche d'un employee 

        . php :
            - include ( "fonction.php" ) ;
            - prendre par GET le numero de l'employee .
            - appeler la fonction get_employee ( $id ) .

        . html :
            - afficher le resultat dans un tableau .


Revenir sur "fonction.php" :

        . get_employee_avec_salaire_et_emploi ( $id )  :
            - $sql = " SELECT s.salary, t.title FROM salaries s join titles t on s.emp_no = t.emp_no where s.emp_no= %d " ;
            - return $employe_detail_avec_salaire_et_emploi ;


Revenir sur "fiche_employee.php" : 

        . php :
            - appeler la fonction get_employee_avec_salaire_et_emploi ( $id ) ;
            
        . html :
            - creer un tableau qui contient l'historique des salaires et des emploi .