



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
<?php
require_once('../basedonnee/films.php');


$srcinput = '';

if (isset($_GET['id'])) {
    $idfilm = $_GET['id'];
    $film = new films();
    $film = $film->getfilm($idfilm);
    $film = $film->fetch(PDO::FETCH_ASSOC);

    
    $nominput = $film['nomfilm'];
    $srcinput = $film['src']; 
    $desfilminput = $film['desfilm'];
    $datefilminput = $film['datefilm'];
    $romfilminput = $film['romfilm'];
}

if (isset($_POST['idfilm'])) {
    $idfilm = $_POST['idfilm'];
    $nomfilm = $_POST['nomfilm'];
    $desfilm = $_POST['desfilm'];
    $datefilm = $_POST['datefilm'];
    $romfilm = $_POST['romfilm'];

   
    $src = $srcinput;


    
    if (isset($_FILES['src'])) {
        $targetDir = "../home/img/";
        $fileName = basename($_FILES['src']['name']);
        $targetFilePath = $targetDir . $fileName;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($fileType), $allowedTypes)) {
            if (move_uploaded_file($_FILES['src']['tmp_name'], $targetFilePath)) {
                $src = $fileName; 
            } else {
                echo "<script>alert('Erreur lors du téléchargement de l\'image.');</script>";
            }
        } else {
            echo "<script>alert('Type de fichier invalide.');</script>";
        }
    }

    $film = new films();
    $film->modif($idfilm, $nomfilm, $src, $desfilm, $datefilm, $romfilm);

    echo '<script>
        alert("Modification effectuée avec succès.");
        window.location.href = "cadmin.php";
    </script>';
}
?>


 
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
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                               
                               
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
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
                       

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cadmin.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">films</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="gereuser.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Users</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="gereresrvasion.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Réservation</span></a></li>

                        
                       
                       
                       
                    </ul>
                </nav>
             
            </div>
           
        </aside>
       
        <div class="page-wrapper">
          
       
           
            <div class="container-fluid">
            <div class="col-md">
                        <div class="card">
                        
                                <div class="card-body">
                                  <h4 class="card-title" id="ajouter">modif film de nom :</h4>
                                  <form class="form" action="modiffilm.php" method="post" enctype="multipart/form-data" id="form">
    <input type="hidden" name="idfilm" value="<?php echo $idfilm ?>">

    <div class="mb-3">
        <label for="nom" class="form-label">Titre</label>
        <input type="text" class="form-control" name="nomfilm" id="nom" value="<?php echo $nominput ?>" required>
    </div>

    <div class="mb-3">
        <label for="src" class="form-label">Image actuelle</label><br>
        <img src="../home/img/<?php echo $srcinput ?>" alt="Film Image" style="max-width: 200px; height: auto;">
    </div>

    <div class="mb-3">
        <label for="src" class="form-label">Nouvelle image (facultatif)</label>
        <input type="file" class="form-control" name="src" id="src" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="Description" class="form-label">Description</label>
        
        <textarea class="form-control" name="desfilm" id="Description"  ><?php echo $desfilminput ?></textarea>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Date de projection du film</label>
        <input type="date" class="form-control" name="datefilm" id="date" value="<?php echo $datefilminput ?>" required>
    </div>

    <div class="mb-3">
        <label for="romm" class="form-label">Nom de la salle</label>
        <input type="text" class="form-control" name="romfilm" id="romm" value="<?php echo $romfilminput ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

                        </div>
               
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
