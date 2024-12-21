<?php
class reservation {
    private $iduser ;
    private $idfilm ;
    
   
    function __construct()
    {

        
    }
    public function init($iduser,$idfilm){
        $this->iduser=$iduser;
        $this->idfilm=$idfilm;
        
       

    }
    public function list(){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bdreservation ;");
        return $res ;
    }
    public function ajouter($iduser,$idfilm){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $dbc->exec("insert into bdreservation values('','$iduser','$idfilm');");
    }
    public function supreme($id){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $dbc->exec("DELETE FROM bdreservation WHERE idr='$id';");
        
    }
    public function listRuser($id){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bdreservation where iduser='$id' ;");
        return $res ;
    }
    public function getavecfilm($iduser,$idfilm){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bdreservation where idfilm='$idfilm' and iduser='$iduser' ;");
        return $res ;
    }

}

?>