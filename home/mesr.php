<?php
    session_start();
    if(!(isset($_SESSION["emailuser"])and isset($_SESSION['passuser']))){
        
        header('Location:login.php');
    }
    require_once('../basedonnee/films.php');
    $films=new films();
    $listfilms=$films->list();
    
    require_once('../basedonnee/reservation.php');
    $reservation=new reservation();
    $listreservation=$reservation->listRuser($_SESSION['iduser']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="stylehome.css">
    <link rel="stylesheet" href="./style/stylehomeuser.css">
    
    <title>Home</title>
</head>
<body style="background-color: black;">
  
     <!-- navbar-->
    <div class="topnav">
        <a  href="homeuser.php">films</a>
        <a  href="mesr.php" style="color: white;" class="active">Mes Réservation</a>
        <a  class="compte" href="deconnexion.php">Deconnxion</a>
        <a  class="logo compte" style="padding-left: 8px;" ><i class="fa fa-user-circle-o" aria-hidden="true"><i style="padding-left: 8px;"><?php echo $_SESSION["emailuser"] ?></i></i></a>
        
      </div>
    
      <div >
        <div style="height: 100px;">
          
      </div>
     
      </div>

    
      



      <!--list filmes-->
    <div class="listf">
        <?php
            foreach($listreservation as $row){
                $film=$films->getfilmuser($row[2]);
                $film=$film->fetch(PDO::FETCH_ASSOC);
                $nom=$film['nomfilm'];
                $date=$film['datefilm'];
                $romm=$film['romfilm'];
                $src=$film['src'];
                $desfilm=$film['desfilm'];
              echo "
              <div class='card' style='width: 18rem;'>
                <img src='./img/$src' class='card-img-top limg' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>$nom</h5>
                  <h6 class='card-text'>le $date</h6>
                  <h5 class='card-title'>Nom de salle : $romm</h5>
                  <p class='card-text'>$desfilm</p>
                <a href='supreservation.php?id=$row[0]' class='btn btn-danger'>supremer réservation</a>
                </div>
              </div>
              
              
              ";

            }




        

        ?>




        
          
    </div>
    <script> 
      
      function desplyeoui(){
       const l =document.getElementById('lister');
       if(l.style.display=="none"){
        l.style.display="block";
       }else{l.style.display="none";}
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>