<?php


    include ( "fonction.php" ) ;

    $nom_dep = $_POST [ "dep" ] ;
    $nom_e = $_POST [ "nom_e" ] ;
    $age_min = $_POST [ "age_min" ] ;
    $age_max = $_POST [ "age_max" ] ;


    if ( empty ( $nom_dep ) )
    {
        $nom_dep = "" ;
    }
    if ( empty ( $nom_e ) )
    {
        $nom_e = "" ;
    }
    if ( empty ( $age_min ) )
    {
        $age_min = 0 ;
    }
    if ( empty ( $age_max ) )
    {
        $age_max = 1000000 ;
    }

    $resultat_recherche = recherche_emploie ( $nom_dep , $nom_e , $age_min , $age_max ) ;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat recherche .</title>
</head>
<body>
    <br>
    <br>
    <br>
    <h3>Resultat du recherche : </h3>
    <br>
    <br>
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
            $taille = count ( $resultat_recherche ) ;
            for ( $i = 0 ; $i < $taille ; $i ++ ) 
            { 
        ?>
            <tr>
                <td><a href="fiche_employee.php?id_empl=<?php echo $resultat_recherche[$i]["emp_no"] ; ?>"><?php echo $resultat_recherche[$i]["emp_no"] ; ?></a></td>
                <td><?php echo $resultat_recherche[$i]["birth_date"] ; ?></td>
                <td><?php echo $resultat_recherche[$i]["first_name"] ; ?></td>
                <td><?php echo $resultat_recherche[$i]["last_name"] ; ?></td>
                <td><?php echo $resultat_recherche[$i]["gender"] ; ?></td>
                <td><?php echo $resultat_recherche[$i]["hire_date"] ; ?></td>
            </tr>
        <?php
            } 
        ?>
    </table>
    <br>
    <br>
    <a href="index.php">Retour</a>
</body>
</html>