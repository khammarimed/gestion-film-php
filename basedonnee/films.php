<?php
class films {
    private $nomfilm ;
    private $src ;
    private $desfilm;
    private $datefilm; 
    private $romfilm ;
    function __construct()
    {

        
    }
    public function init($nomfilm,$src,$desfilm,$datefilm,$romfilm){
        $this->nomfilm=$nomfilm;
        $this->src=$src;
        $this->desfilm =$desfilm;
        $this->romfilm=$romfilm;
        $this->datefilm=$datefilm;

    }
    public function list(){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bdfilm ;");
        return $res ;
    }
    public function ajouter($nomfilm,$src,$desfilm,$datefilm,$romfilm){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $dbc->exec("insert into bdfilm values('','$nomfilm','$src','$desfilm','$datefilm','$romfilm');");
    }
    public function supreme($id){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $dbc->exec("DELETE FROM bdfilm WHERE idfilm='$id';");
        
    }
    public function getfilmuser($id){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bdfilm where idfilm='$id' ;");
        return $res ;
    }
    public function getfilm($id){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $res=$dbc->query("select * from bdfilm where idfilm='$id' ;");
        return $res ;
    }

    public function modif($id,$nomfilm,$src,$desfilm,$datefilm,$romfilm){
        require_once('../config.php');
        $cnx=new connexion();
        $dbc=$cnx->cnx();
        $dbc->exec("UPDATE bdfilm SET nomfilm = '$nomfilm' WHERE idfilm='$id';
                    UPDATE bdfilm SET src = '$src' WHERE idfilm='$id';
                    UPDATE bdfilm SET desfilm = '$desfilm' WHERE idfilm='$id';
                    UPDATE bdfilm SET datefilm = '$datefilm' WHERE idfilm='$id';
                    UPDATE bdfilm SET romfilm = '$romfilm' WHERE idfilm='$id';
                    
        
        
        
        ");
    }
}

?>