<?php
session_start();
unset($_SESSION['nom']);
unset($_SESSION['pass']);


header('location:cadmin.php');



?>