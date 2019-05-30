<?php


class absencesDB {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }
    public function AddAbsence($data){
        //$_db->beginTransaction();
        try{
            $query="insert into absence ";
            $query.=" (id_professeur,date,heure_debut,heure_fin)";
            $query.=" values(:id_professeur,:date,:heure_debut,:heure_fin)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':id_professeur',$data['id_professeur']);
            $resultset->bindValue(':date',$data['date']);
            $resultset->bindValue(':heure_debut',$data['heure_debut']);
            $resultset->bindValue(':heure_fin',$data['heure_fin']);
            $resultset->execute();
            print "Insertion effectuée!!!!";
        }
        catch(PDOException $e){
            print "Echec de l'insertion ".$e->getMessage();
        }
        //var_dump($data);
       // $_db->commit();
    }
    
    public function getAbsences() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from absence";
            //$resultset->bindValue(':login',$login);
            //$resultset->bindValue(':password',$password);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Genre($data);
            }   
            
        }
        catch(PDOException $e){
            print $e->getMessage(); 
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }

}


