<?php


    include ( "fonction.php" ) ;



    $nombre_de_toutes_les_employees = get_n_employee () ;
    $nombre_de_toutes_les_employees_m = get_n_employee_m () ;
    $nombre_de_toutes_les_employees_f = get_n_employee_f () ;

    $salaire_moyenn_pour_chaque_emp = get_salaire_moyenn_pour_chaque_emploi () ;





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <h3>Detail de l"employee :</h3>
    <p>Nombre de toutes les employees : <?php echo $nombre_de_toutes_les_employees[0]["ne"] ; ?> </p>
    <p>Nombre de toutes les employees sexe masculin : <?php echo $nombre_de_toutes_les_employees_m[0]["ne"] ; ?> </p>
    <p>Nombre de toutes les employees sexe feminin : <?php echo $nombre_de_toutes_les_employees_f[0]["ne"] ; ?> </p>

    <h3>Le salaire moyenn pour chaque emploi :</h3>
    <table>
        <tr>
            <th>Emploi</th>
            <th>Salaire</th>
        </tr>
        <?php for ( $i = 0 ; $i < count ( $salaire_moyenn_pour_chaque_emp ) ; $i ++ ) { ?>
            <tr>
                <td><?php echo $salaire_moyenn_pour_chaque_emp[$i]["emploi"] ; ?></td>
                <td><?php echo $salaire_moyenn_pour_chaque_emp[$i]["salaire_moyen"] ; ?></td>
            </tr>
        <?php } ?>
    </table>


</body>
</html>