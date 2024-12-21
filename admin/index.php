<?php
  
  session_start();
  require_once('../config.php');
  $cnx=new connexion();
  $dbc=$cnx->cnx();
  




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./style/styleadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>page login admin</title>
</head>
<body>
    <form class="form" action="index.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">nom admin</label>
          <input name="nom" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre nom avec qui que ce soit d'autre</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">mot de pass</label>
          <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-success">connexion</button>
      </form>

      <?php
      
        if(isset($_POST['nom'])){
          $adminename=$_POST['nom'];
          $pass=$_POST['pass'];
          $select =$dbc->query("select * from admin where adminename='$adminename' and pass='$pass';");
          $row=$select->fetch(PDO::FETCH_ASSOC);
          if(is_array($row)){
            $_SESSION['nom']=$row['adminename'];
          $_SESSION['pass']=$row['pass'];
          }else{
            echo '<script >';
            echo'alert("invalid compte");';
            echo'</script>';

        }
        }
        if(isset($_SESSION["nom"])and isset($_SESSION['pass'])){
          header("Location:cadmin.php"); 
        }
        
      ?>

</body>
</html>