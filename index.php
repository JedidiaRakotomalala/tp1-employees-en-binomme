


















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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">

    <br>
    <br>
    <br>
    <br>

    <h3>Les departements sont : </h3>
    <br>
    <h3>Les departements avec les noms des managers en cour : </h3>
    <br>
    
    <table class="table table-striped table-bordered table-hover bg-white" style="max-width: 900px;">
        <thead class="table-dark">
            <tr>
                <th>Le numero des departements </th>
                <th>Le nom des departements </th>
                <th>Le first name des managers </th>
                <th>Le last name des managers </th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
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
    <table class="table table-striped table-bordered table-hover bg-white" style="max-width: 900px;">
        <thead class="table-dark">
            <tr>
                <th>Le numero des departements </th>
                <th>Le nom des departements </th>
                <th>Le first name des managers </th>
                <th>Le last name des managers </th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
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
    
    <table class="table table-striped table-bordered table-hover bg-white" style="max-width: 800px;">
        <thead class="table-dark">
            <tr>
                <th>Le numero des departements </th>
                <th>Le nom des departements </th>
                <th>Le first name des managers </th>
                <th>Le last name des managers </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $taille = count ( $tout_les_departements_et_manager ) ;
                for ( $i = 0 ; $i < $taille ; $i ++ ) 
                { 
            ?>
                <tr>
                    <td><a class="fw-bold text-decoration-none" href="afficher_les_employees.php?id_dep=<?php echo $tout_les_departements_et_manager[$i]["dept_no"] ; ?>"><?php echo $tout_les_departements_et_manager[$i]["dept_no"] ; ?></a></td>
                    <td><?php echo $tout_les_departements_et_manager[$i]["dept_name"] ; ?></td>
                    <td><?php echo $tout_les_departements_et_manager[$i]["first_name"] ; ?></td>
                    <td><?php echo $tout_les_departements_et_manager[$i]["last_name"] ; ?></td>
                </tr>
            <?php
                } 
            ?>
        </tbody>
    </table>

    <br>
    <h3>Recherche : </h3>
    <br>

    <form action="resultat_recherche.php" method="post" style="max-width: 400px;">
        <div class="mb-3">
            <label class="form-label">Nom departement : </label>
            <input type="text" name="dep" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Nom employee : </label>
            <input type="text" name="nom_e" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Age min :</label>
            <input type="number" name="age_min" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Age max :</label>
            <input type="number" name="age_max" class="form-control">
        </div>
        
        <br>
        <input type="submit" value="Chercher" class="btn btn-primary px-4">
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