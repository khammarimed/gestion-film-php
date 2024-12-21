<?php
require_once('../basedonnee/user.php');
$user=new user();
$user->supreme($_GET['id']);
echo $_GET['id'];
header("Location: gereuser.php");

?>