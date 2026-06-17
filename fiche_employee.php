<?php

    include ( "fonction.php" ) ;

    $id_empl = $_GET [ "id_empl" ] ;

    $employee_en_question = get_employee ( $id_empl ) ;

    $employee_en_question_avec_salaire_et_emploi = get_employee_avec_salaire_et_emploi ( $id_empl ) ;


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

    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>

    <h3>Le fiche de l'employe de numero : <?php echo $id_empl ; ?> :</h3>
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
            <tr>
                <td><?php echo $employee_en_question[0]["emp_no"] ; ?></td>
                <td><?php echo $employee_en_question[0]["birth_date"] ; ?></td>
                <td><?php echo $employee_en_question[0]["first_name"] ; ?></td>
                <td><?php echo $employee_en_question[0]["last_name"] ; ?></td>
                <td><?php echo $employee_en_question[0]["gender"] ; ?></td>
                <td><?php echo $employee_en_question[0]["hire_date"] ; ?></td>
            </tr>
        </tbody>
    </table>

    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>


    <h3>Le fiche de l'employe de numero : <?php echo $id_empl ; ?> avec salaire et emploi :</h3>
    <br>
    
    <table class="table table-striped table-bordered table-hover bg-white" style="max-width: 600px;">
        <thead class="table-dark">
            <tr>
                <th>Salaire </th>
                <th>Emploi </th>
            </tr>
        </thead>
        <tbody>
            <?php for ( $i = 0 ; $i < count ( $employee_en_question_avec_salaire_et_emploi ) ; $i ++ ) { ?>
                <tr>
                    <td><?php echo $employee_en_question_avec_salaire_et_emploi[$i]["salary"] ; ?></td>
                    <td><?php echo $employee_en_question_avec_salaire_et_emploi[$i]["title"] ; ?></td>            
                </tr>
            <?php } ?>
        </tbody>
    </table>


</body>
</html>