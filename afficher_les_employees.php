


















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
</head>
<body>



    <h3>Les employees dans le departement numero : <?php echo $_SESSION["id_dep"] ; ?> sont  :</h3>
    <table border="1px solide" >
        <tr>
            <th>Numero de l'employee </th>
            <th>Date de naissance </th>
            <th>Nom </th>
            <th>Prenoms </th>
            <th>Genre </th>
            <th>Date de recrutement </th>
        </tr>
        <?php 
            $taille = count ( $tout_les_employees ) ;
            for ( $i = 0 ; $i < $taille ; $i ++ ) 
            { 
        ?>
            <tr>
                <td><a href="fiche_employee.php?id_empl=<?php echo $tout_les_employees[$i]["emp_no"] ; ?>"><?php echo $tout_les_employees[$i]["emp_no"] ; ?></a></td>
                <td><?php echo $tout_les_employees[$i]["birth_date"] ; ?></td>
                <td><?php echo $tout_les_employees[$i]["first_name"] ; ?></td>
                <td><?php echo $tout_les_employees[$i]["last_name"] ; ?></td>
                <td><?php echo $tout_les_employees[$i]["gender"] ; ?></td>
                <td><?php echo $tout_les_employees[$i]["hire_date"] ; ?></td>
            </tr>
        <?php
            } 
        ?>
    </table>
    <a href="precedent.php">Precedent</a>
    <a href="suivant.php">Suivant</a>




</body>
</html>