<?php


    include ( "fonction.php" ) ;


    $i = 1 ;
    if ( changer_nom_dep ( $_POST["id"] , $_POST["dep"] , $_POST["date"] ) )
    {
        $i = 0 ;
        
    }
    

$id = $_POST["id"] ;

    $message[] = "Changement de departement reussit !" ;
    $message[] = "Changement de departement echouer !" ;














?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php echo $message[$i] ; ?></h2>
    <a href="changement_de_departement.php?id=<?php echo $id ; ?>">Retour</a>
</body>
</html>