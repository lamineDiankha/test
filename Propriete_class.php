<?php
namespace location\dao; 

class Proprietaire{
    var $id;
    var $numPiece;
    var $nom;
    var $tel;
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
 
    function addProprietaire()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "insert into Proprietaire 
                  values(null, :numP, :nom, :tel)";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array('numP'=>$this->numPiece   ,
                  'nom'=>$this->nom,
                  'tel'=>$this->tel
        ));
        return $data;
    }
 
    function allProprietaire()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "select * from Proprietaire";
        // preparation de la requete
        $donnees = $this->bdd->query($sql);
        return $donnees;
    }
 
 public function getList()

  {

    $prop = array();


    $q = $this->_db->query('SELECT id, numPiece, , nom, tel FROM Proprietaire');


    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))

    {

      $prop[] = new Proprietaire($donnees);

    }


    return $prop;

  } 

}

public function update(Proprietaire $prop)

  {

    $q = $this->_db->prepare('UPDATE Proprietaire SET  =  numPiece = :numPiece, nom = :nom, tel= :tel WHERE id = :id');


    $q->binValue(':numPiece', $prop->numPiece(), PDO::PARAM_VATCH);

    $q->bindValue(':nom', $prop->nom(), PDO::PARAM_VATCH);

    $q->bindValue(':tel, $prop->tel(), PDO::PARAM_VATCH);

    $q->bindValue(':id', $prop->id(), PDO::PARAM_INT);


    $q->execute();

  }
  function udateProprietaire()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "update into Proprietaire 
                  values(null, :numP, :nom, :tel)";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array('numP'=>$this->numPiece   ,
                  'nom'=>$this->nom,
                  'tel'=>$this->tel
        ));
        return $data;
    }
?>