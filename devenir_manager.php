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
</head>
<body>
    

    <h3>Le manager en cour est : <?php echo $man_c[0]["manager_first_name"] ; ?></h3>


    <form action="traitement_manager.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_emp ; ?>" >
        <label>Date de debut </label>
        <input type="date" name="date" >
        <br>
        <input type="submit" value="Devenir manager">
    </form>

    <a href="afficher_les_employees.php">Retour</a>






</body>
</html>