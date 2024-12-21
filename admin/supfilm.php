<?php
require_once('../basedonnee/films.php');
$film=new films();
$film->supreme($_GET['id']);
echo $_GET['id'];
header("Location: cadmin.php");

?>