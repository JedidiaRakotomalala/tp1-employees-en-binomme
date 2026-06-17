<?php
    include ( "fonction.php" ) ;

    $tout_les_departements = get_all_departments () ;
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


    <h3>Les departements sont : </h3>
    <br>
    <table border="1px solide" >
        <tr>
            <td>Le numero des departements </td>
            <td>Le nom des departements </td>
        </tr>
        <?php 
            $taille = count ( $tout_les_departements ) ;
            for ( $i = 0 ; $i < $taille ; $i ++ ) 
            { 
        ?>
            <tr>
                <td><?php echo $tout_les_departements[$i]["dept_no"] ; ?></td>
                <td><?php echo $tout_les_departements[$i]["dept_name"] ; ?></td>
            </tr>
        <?php
            } 
        ?>
    </table>
</body>
</html>