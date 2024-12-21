<?php
    session_start();
    



    require_once('../basedonnee/films.php');
    $films=new films();
    $listfilms=$films->list();

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="stylehome.css">
    
    <title>Home</title>
</head>
<body>
  
     <!-- navbar-->
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="login.php">login</a>
        <a href="singup.php">sign up</a>
        
      </div>
    
      <div class="b">
        <div class="animated-text">
          <span>Réservez</span>
          <span>vos </span>
          <span>places</span>
          <span>pour</span>
          <span>les</span>
          <span>meilleurs</span>
          <span>films</span>
          <span>en</span>
          <span>quelques</span>
          <span>clics</span>
          <span>et</span>
          <span>vivez</span>
          <span>une</span>
          <span>expérience</span>
          <span>cinéma</span>
          <span>inoubliable</span>
      </div>
     
      </div>



      <!--list filmes-->
    <div class="listf">
        <?php
            foreach($listfilms as $row){

              echo "
              <div class='card' style='width: 18rem;'>
                <img src='./img/$row[2]' class='card-img-top limg' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>$row[1]</h5>
                  <h6 class='card-text'>le $row[4]</h6>
                  <p class='card-text'>$row[3]</p>
                
                </div>
              </div>
              
              
              ";

            }




        

        ?>




        
          
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>