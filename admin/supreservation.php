<?php
require_once('../basedonnee/reservation.php');
$reservation=new reservation();
$reservation->supreme($_GET['id']);

header("Location: gereresrvasion.php");

?>