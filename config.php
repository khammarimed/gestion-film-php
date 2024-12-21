<?php
class connexion
{ 
public function cnx()
  {
    $dbc=new PDO('mysql:host=localhost;dbname=bdcinema','root',''); 
    return $dbc;
  }   
}
?>
