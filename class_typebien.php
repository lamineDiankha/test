<?php 
namespace location\dao;

class Proprietaire{
    var $id;
    var $typebien;
    private $bdd;
 
    private function getConnexion(){
        try{
            if($this->bdd == null){
                $this->bdd = new PDO('mysql:host=;dbname=BDlocation;charset=utf8', 'root', 'jaimemamere',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
            }       
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
 
    function addtypebien()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "insert into typebien
                  values(null, :nom )";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array(
                'nom'=>$this->nom,
            
        ));
        return $data;
    }
 
    function alltypebien()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "select * from typebien";
        // preparation de la requete
        $donnees = $this->bdd->query($sql);
        return $donnees;
    }

    public function getList()

  {

    $prop = [];


    $q = $this->_db->query('SELECT id, nom FROM typebien);


    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))

    {

      $prop[] = new typebien($donnees);

    }


    return $persos;

  }
  ?>