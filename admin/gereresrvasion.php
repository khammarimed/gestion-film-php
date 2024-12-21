<?php
    session_start();
    if(!(isset($_SESSION["nom"])and isset($_SESSION['pass']))){
        
        header('Location:index.php');
    }
    require_once('../basedonnee/reservation.php');
    $reservation=new reservation();
    $listreservation=$reservation->list();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <link href="./style/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="./style/dist/css/style.min.css" rel="stylesheet">
</head>
<body>
 
<div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
   
    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    
                    <a class="navbar-brand" href="cadmin.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" /> 
                        </b>
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                        </span>
                       
                    </a>
                  
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        
                        
                    </ul>
                    <div style="color: wheat;"><i class="ti-user m-r-5 m-l-5" "></i >admin nom:  <?php echo $_SESSION["nom"] ?></div>
                    <ul class="navbar-nav float-right">
                        
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                               
                               
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                               
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
      
        <aside class="left-sidebar" data-sidebarbg="skin5">
           
            <div class="scroll-sidebar">
              
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                       

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cadmin.php" aria-expanded="false"><i class="fa fa-film"></i><span class="hide-menu">films</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="gereuser.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Users</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="gereresrvasion.php" aria-expanded="false"><i class="fa fa-tasks"></i><span class="hide-menu">Réservation</span></a></li>

                        
                       
                       
                       
                    </ul>
                </nav>
             
            </div>
           
        </aside>
       
        <div class="page-wrapper">
          
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tables</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="container-fluid">
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Static Table</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">id user</th>
                                        <th scope="col">nom user</th>
                                        <th scope="col">Nom film</th>
                                        <th scope="col">Date film</th>
                                    </tr>
                                    
                                    <?php 
                    
                                     foreach($listreservation as $row){
                                        require_once('../basedonnee/films.php');
                                        $film=new films();
                                        $film=$film->getfilm($row[2]);
                                        $film=$film->fetch(PDO::FETCH_ASSOC);
                                        $nom=$film['nomfilm'];
                                        $date=$film['datefilm'];
                                        $romm=$film['romfilm'];
                                        require_once('../basedonnee/user.php');
                                        $user=new user();
                                        $user=$user->getuser($row[1]);
                                        $user=$user->fetch(PDO::FETCH_ASSOC);
                                        $nomuser=$user['nomuser'];
                                        
                                                    echo "<tr>
                                        <td scope='col'>$row[0]</td>
                                        <td scope='col'>$row[1]</td>
                                        <td scope='col'>$nomuser</td>
                                        <td scope='col'>$nom</td>
                                        <td scope='col'>$date</td>
            
            
                                        <td><a class='btn btn-danger' href='supreservation.php?id=$row[0]'>Supprimer</a></td>  ";
                                           }
    

                
                ?>
                                  </tbody>
                            </table>
                        </div>
                      
                        
                        
                        
               
            </div>
        </div>
        
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>
</html>