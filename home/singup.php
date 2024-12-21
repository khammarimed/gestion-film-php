<?php
  session_start();
  require_once('../config.php');
  $cnx=new connexion();
  $dbc=$cnx->cnx();
  require_once('../basedonnee/user.php');
  $user=new user();
  if(isset($_SESSION['emailuser'])){
    $select =$user->login($_SESSION['emailuser'],$_SESSION['passuser']);
    $row=$select->fetch(PDO::FETCH_ASSOC);
    $_SESSION['iduser']=$row['iduser'];
    header('location:homeuser.php');
  }
 



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
    <form action="singup.php" method="post" style="height: 600px;">
        <h3>Login Here</h3>

        <label for="username">Nom</label>
        <input name="nom" type="text" placeholder="Nom" id="username" required>
        <label for="username">Email</label>
        <input name="email" type="email" placeholder="Email" id="username" required>

        <label  for="password">mot de pass</label>
        <input name="pass" type="password" placeholder="Password" id="password" required>

        <button>crée compte</button>
        <a href="login.php">vous  avez un compte ? conexion</a>
    </form>

    <?php
      
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $res=$user->recherche_user('emailuser',$e);
            $res=$res->fetch(PDO::FETCH_ASSOC);
            if(!(is_array($res))){
                if(strlen($_POST['pass'])>8){
                    $user->ajouter($_POST['nom'],$_POST['email'],$_POST['pass']);
                    $psss=$_POST['pass'];
                    $_SESSION['emailuser']=$_POST['email'];
                    $_SESSION['passuser']=$_POST['pass'];
                    header('location:singup.php');
                    
                }else{
                    echo "<script >";
                echo"alert('le mote pass est faible  ');";
                echo"</script>";
                }
                
            }else{
                echo "<script >";
                echo"alert('la compte de Email $e est  deja cree  ');";
                echo"</script>";
            }
            
           
        }
        
      ?>

</body>
</html>