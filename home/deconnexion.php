<?php
session_start();
unset($_SESSION['emailuser']);
unset($_SESSION['passuser']);
unset($_SESSION['iduser']);

header('location:index.php');



?>