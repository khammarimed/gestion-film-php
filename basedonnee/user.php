<?php
class user {
    private $nom ;
    private $email ;
    private $pass;
   
    function __construct()
    {

        
    }
    public function init($nom,$email,$pass){
        $this->nom=$nom;
        $this->email=$email;
        $this->pass =$pass;
       

    }
    public function list(){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bduser ;");
        return $res ;
    }
    public function ajouter($nom,$email,$pass){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $dbc->exec("insert into bduser values('','$nom','$email','$pass');");
    }
    public function supreme($id){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $dbc->exec("DELETE FROM bduser WHERE iduser='$id';");
        
    }
    public function modifpass($id,$new){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $dbc->exec("UPDATE bduser SET mdpuser = '$new' WHERE iduser='$id';");
    }
    function recherche_user($att,$val)
    {
 
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $req= "SELECT * FROM bduser WHERE emailuser='$val' ; " ;
        $res=$dbc->query($req) or print_r($pdo->errorInfo());
        
        return $res ;
        

    } 
    public function getuser($id){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bduser where iduser='$id' ;");
        return $res ;
    }
    public function login($emailuser,$passuser){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bduser where emailuser='$emailuser' and mdpuser='$passuser';");
        return $res ;
    }


}

?>