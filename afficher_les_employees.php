<?php

    session_start () ;

    include ( "fonction.php" ) ;


    if ( empty ( $_SESSION["id_dep"] ) )
    {
        $_SESSION["id_dep"] = $_GET [ "id_dep" ] ;
    }
    
    
    

    $tout_les_employees = get_all_employees_in_dep ( $_SESSION["id_dep"] , $_SESSION["indice"] ) ;


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des employees : </title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">



    <h3>Les employees dans le departement numero : <?php echo $_SESSION["id_dep"] ; ?> sont  :</h3>
    <br>
    
    <table class="table table-striped table-bordered table-hover bg-white" style="max-width: 1000px;">
        <thead class="table-dark">
            <tr>
                <th>Numero de l'employee </th>
                <th>Date de naissance </th>
                <th>Nom </th>
                <th>Prenoms </th>
                <th>Genre </th>
                <th>Date de recrutement </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $taille = count ( $tout_les_employees ) ;
                for ( $i = 0 ; $i < $taille ; $i ++ ) 
                { 
            ?>
                <tr>
                    <td><a class="fw-bold text-decoration-none" href="fiche_employee.php?id_empl=<?php echo $tout_les_employees[$i]["emp_no"] ; ?>"><?php echo $tout_les_employees[$i]["emp_no"] ; ?></a></td>
                    <td><?php echo $tout_les_employees[$i]["birth_date"] ; ?></td>
                    <td><?php echo $tout_les_employees[$i]["first_name"] ; ?></td>
                    <td><?php echo $tout_les_employees[$i]["last_name"] ; ?></td>
                    <td><?php echo $tout_les_employees[$i]["gender"] ; ?></td>
                    <td><?php echo $tout_les_employees[$i]["hire_date"] ; ?></td>
                </tr>
            <?php
                } 
            ?>
        </tbody>
    </table>
    
    <br>
    <a href="precedent.php" class="btn btn-primary me-2">Precedent</a>
    <a href="suivant.php" class="btn btn-primary">Suivant</a>




</body>
</html>