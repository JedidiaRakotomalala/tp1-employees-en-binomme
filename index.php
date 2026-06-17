<?php
    include ( "fonction.php" ) ;

    $tout_les_departements_et_manager = get_all_departments_and_manager_s_name () ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Bienvenue</title>
</head>
<body>

    <br>
    <br>
    <br>
    <br>

    <h3>Les departements avec les noms des managers en cour : </h3>
    <br>
    <table border="1px solide" >
        <tr>
            <th>Le numero des departements </th>
            <th>Le nom des departements </th>
            <th>Le first name des managers </th>
            <th>Le last name des managers </th>
        </tr>
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
    </table>
</body>
</html>