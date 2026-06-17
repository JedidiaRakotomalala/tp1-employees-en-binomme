


















<?php

    session_start () ;

    $_SESSION["indice"] = 0 ;

    $_SESSION["id_dep"] = null ;

    include ( "fonction.php" ) ;

    $tout_les_departements = get_all_departments () ;

    $tout_les_departements_et_manager = get_all_departments_and_manager_s_name () ;

    $tout_les_departements_et_manager_avec_nombre = get_all_departments_and_manager_s_name_and_numbre () ;
 

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Bienvenue</title>
</head>
<body>

    <br>
    <br>
    <br>
    <br>






    <h3>Les departements sont : </h3>
    <br>
    <table border="1px solide" >
        <tr>
            <td>Le numero des departements </td>
            <td>Le nom des departements </td>
        </tr>
        <?php 
            $taille = count ( $tout_les_departements ) ;
            for ( $i = 0 ; $i < $taille ; $i ++ ) 
            { 
        ?>
            <tr>
                <td><?php echo $tout_les_departements[$i]["dept_no"] ; ?></td>
                <td><?php echo $tout_les_departements[$i]["dept_name"] ; ?></td>
            </tr>
        <?php
            } 
        ?>
    </table>

    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>


    <h3>Les departements avec les noms des managers en cour : </h3>
    <br>
    <table border="1px solide" >
        <tr>
            <th>Le numero des departements </th>
            <th>Le nom des departements </th>
            <th>Le first name des managers </th>
            <th>Le last name des managers </th>
        </tr>
        <?php 
            $taille = count ( $tout_les_departements_et_manager ) ;
            for ( $i = 0 ; $i < $taille ; $i ++ ) 
            { 
        ?>
            <tr>
                <td><?php echo $tout_les_departements_et_manager[$i]["dept_no"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager[$i]["dept_name"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager[$i]["first_name"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager[$i]["last_name"] ; ?></td>
            </tr>
        <?php
            } 
        ?>
    </table>

    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>

    <h3>Les departements avec les noms des managers en cour avec les liens : </h3>
    <br>
    <table border="1px solide" >
        <tr>
            <th>Le numero des departements </th>
            <th>Le nom des departements </th>
            <th>Le first name des managers </th>
            <th>Le last name des managers </th>
        </tr>
        <?php 
            $taille = count ( $tout_les_departements_et_manager ) ;
            for ( $i = 0 ; $i < $taille ; $i ++ ) 
            { 
        ?>
            <tr>
                <td><a href="afficher_les_employees.php?id_dep=<?php echo $tout_les_departements_et_manager[$i]["dept_no"] ; ?>"><?php echo $tout_les_departements_et_manager[$i]["dept_no"] ; ?></a></td>
                <td><?php echo $tout_les_departements_et_manager[$i]["dept_name"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager[$i]["first_name"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager[$i]["last_name"] ; ?></td>
            </tr>
        <?php
            } 
        ?>
    </table>







    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>








    <h3>Recherche : </h3>

    <form action="resultat_recherche.php" method="post">
        <label>Nom departement : </label>
        <input type="text" name="dep" >
        <br>
        <br>
        <label>Nom employee : </label>
        <input type="text" name="nom_e" >
        <br>
        <br>
        <label>Age min :</label>
        <input type="number" name="age_min" >
        <br>
        <br>
        <label>Age max :</label>
        <input type="number" name="age_max" >
        <br>
        <br>
        <input type="submit" value="Chercher">
        <label></label>
    </form>







    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>




    <h3>Les departements avec les noms des managers en cour et les nombres des emloyees : </h3>
    <br>
    <table border="1px solide" >
        <tr>
            <th>Le numero des departements </th>
            <th>Le nom des departements </th>
            <th>Le first name des managers </th>
            <th>Le last name des managers </th>
            <th>Le nombre des employees dans le departement </th>
        </tr>
        <?php 
            $taille = count ( $tout_les_departements_et_manager_avec_nombre ) ;
            for ( $i = 0 ; $i < $taille ; $i ++ ) 
            { 
        ?>
            <tr>
                <td><?php echo $tout_les_departements_et_manager_avec_nombre[$i]["dept_no"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager_avec_nombre[$i]["dept_name"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager_avec_nombre[$i]["first_name"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager_avec_nombre[$i]["last_name"] ; ?></td>
                <td><?php echo $tout_les_departements_et_manager_avec_nombre[$i]["nombre_employee"] ; ?></td>
            </tr>
        <?php
            } 
        ?>
    </table>




    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>




    <a href="detail_employee.php">Detail employee</a>






    <br>
    <br>
    <br>
    <br>
</body>
</html>