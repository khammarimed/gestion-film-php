<?php
require_once('../basedonnee/films.php');


if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $romm = $_POST['romm'];

    


    if ((isset($_FILES['src']))) {
       
        $targetDir = "../home/img/";
        $fileName = basename($_FILES['src']['name']);
        $targetFilePath = $targetDir . $fileName;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($fileType), $allowedTypes)) {
            
            if (move_uploaded_file($_FILES['src']['tmp_name'], $targetFilePath)) {
                
                $film = new films();
            
                $film->ajouter($nom, $fileName, $description, $date, $romm);

               
                header("Location: cadmin.php");
                exit();
            } 
            
            
            
            
            else {
                echo "Erreur lors du téléchargement de l'image.";
            }
        } else {
            echo "Type de fichier non valide. Seuls les formats JPG, JPEG, PNG et GIF sont acceptés.";
        }
    } else {
        echo "Veuillez sélectionner une image à télécharger.";
    }
} else {
    echo "Requête non valide.";
}
?>
