<?php
  
  session_start();
  require_once('../config.php');
  $cnx=new connexion();
  $dbc=$cnx->cnx();
  require_once('../basedonnee/user.php');
  $user=new user();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="./style/stylelogine.css">
    <title>page login user</title>
</head>
<body>
<style>
        body{
            background-image: url(../home/img/bguser.jpg);
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="login.php" method="post">
        <h3>Login Here</h3>

        <label for="username">Email</label>
        <input name="emailuser" type="email" placeholder="Email" id="username" required>

        <label  for="password">mot de pass</label>
        <input name="passuser" type="password" placeholder="mot de pass" id="password" required>

        <button>connexion</button>
        <a href="singup.php">vous navez pas un compte ? inscricre</a>
        <a href="../admin">connexion comme ADMIN</a>
    </form>

      <?php
      
        if(isset($_POST['emailuser'])){
            
          $emailuser=$_POST['emailuser'];
          $passuser=$_POST['passuser'];
          $select =$user->login($emailuser,$passuser);
          $row=$select->fetch(PDO::FETCH_ASSOC);
          if(is_array($row)){
            $_SESSION['emailuser']=$row['emailuser'];
          $_SESSION['passuser']=$row['mdpuser'];
          $_SESSION['iduser']=$row['iduser'];
          }else{
            echo '<script >';
            echo'alert("invalid compte");';
            echo'</script>';

        }
        }
        if(isset($_SESSION["emailuser"])and isset($_SESSION['passuser'])){
          header("Location:homeuser.php"); 
        }
        
      ?>

</body>
</html>