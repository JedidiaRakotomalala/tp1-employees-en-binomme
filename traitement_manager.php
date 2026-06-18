<?php


    include ( "fonction.php" ) ;


    $i = 1 ;
    if ( devenir_manager ( $_POST["id"] , $_POST["date"] ) )
    {
        $i = 0 ;
        
    }
    

$id = $_POST["id"] ;

    $message[] = "Changement de manager reussit !" ;
    $message[] = "Changement de manager echouer !" ;














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
    <a href="devenir_manager.php?id=<?php echo $id ; ?>">Retour</a>
</body>
</html>