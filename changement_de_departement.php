<?php


    include ( "fonction.php" ) ;

    $id_emp =  $_GET ["id"] ;

    $dep_act =  get_current_department_of_employee ( $id_emp ) ;



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
    

    <h3>Le departement actuelle est : <?php echo $dep_act[0]["dept_name"] ; ?></h3>
    <h3>La date de debut du departement actuelle est : <?php echo $dep_act[0]["date_entree_departement"] ; ?></h3>

    <br>

    <form action="traitement_changer_dep.php" method="post" style="max-width: 400px;">
        <input type="hidden" name="id" value="<?php echo $id_emp ; ?>" >
        
        <div class="mb-3">
            <label class="form-label">Nom du departement :</label>
            <input type="text" name="dep" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control">
        </div>
        
        <br>
        <input type="submit" value="Changer" class="btn btn-warning px-4 text-dark">
    </form>

    <br>
    <br>
    
    <a href="afficher_les_employees.php" class="btn btn-secondary">Retour</a>






</body>
</html>