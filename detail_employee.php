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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    

    <h3>Detail de l"employee :</h3>
    <br>
    <p class="mb-2">Nombre de toutes les employees : <span class="fw-bold"><?php echo $nombre_de_toutes_les_employees[0]["ne"] ; ?></span></p>
    <p class="mb-2">Nombre de toutes les employees sexe masculin : <span class="fw-bold"><?php echo $nombre_de_toutes_les_employees_m[0]["ne"] ; ?></span></p>
    <p class="mb-4">Nombre de toutes les employees sexe feminin : <span class="fw-bold"><?php echo $nombre_de_toutes_les_employees_f[0]["ne"] ; ?></span></p>

    <br>
    <h3>Le salaire moyenn pour chaque emploi :</h3>
    <br>
    <table class="table table-striped table-bordered table-hover bg-white" style="max-width: 600px;">
        <thead class="table-dark">
            <tr>
                <th>Emploi</th>
                <th>Salaire</th>
            </tr>
        </thead>
        <tbody>
            <?php for ( $i = 0 ; $i < count ( $salaire_moyenn_pour_chaque_emp ) ; $i ++ ) { ?>
                <tr>
                    <td><?php echo $salaire_moyenn_pour_chaque_emp[$i]["emploi"] ; ?></td>
                    <td><?php echo $salaire_moyenn_pour_chaque_emp[$i]["salaire_moyen"] ; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


</body>
</html>