



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
require_once('../basedonnee/reservation.php');

$reservation=new reservation();

$res=$reservation->getavecfilm($_SESSION['iduser'],$_GET['id']);
$res=$res->fetch(PDO::FETCH_ASSOC);
if(!(is_array($res))){
    $reservation->ajouter($_SESSION['iduser'],$_GET['id']);
    echo $_GET['id'];
    header("Location: mesr.php");
}else{
    echo '<script >';
            echo'alert("film est déjat réserver");';
           echo " window.location.href = 'mesr.php'";
    echo'</script>';

   
}


?>
    
</body>
</html>

