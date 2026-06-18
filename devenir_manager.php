<?php


    include ( "fonction.php" ) ;

    $id_emp =  $_GET ["id"] ;

    $man_c =  get_manager_en_cour ( $id_emp ) ;



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
    

    <h3>Le manager en cour est : <?php echo $man_c[0]["manager_first_name"] ; ?></h3>

    <br>

    <form action="traitement_manager.php" method="post" style="max-width: 400px;">
        <input type="hidden" name="id" value="<?php echo $id_emp ; ?>" >
        
        <div class="mb-3">
            <label class="form-label">Date de debut </label>
            <input type="date" name="date" class="form-control">
        </div>
        
        <br>
        <input type="submit" value="Devenir manager" class="btn btn-success px-4">
    </form>

    <br>
    <br>

    <a href="afficher_les_employees.php" class="btn btn-secondary">Retour</a>






</body>
</html>