<?php


class absencesDB extends absences{

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
    
        public function updateAbsence($champ,$nouveau,$id){        
        
        try {
          
            $query="UPDATE absence set ".$champ." = '".$nouveau."' where id_absence ='".$id."'";            
           // var_dump($id);
            $resultset = $this->_db->prepare($query);
            print $query;
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
   
}
   
    
    public function getAbsences() {
     $query = "select id_absence, id_professeur , date , heure_debut , heure_fin from absence";
        try{
            
            $resultset = $this->_db->prepare($query);
            //$resultset->bindValue(':login',$login,PDO::PARAM_STR);
            //$resultset->bindValue(':password',$password,PDO::PARAM_STR);
            $resultset->execute();      
        }
        catch(PDOException $e){
            print $e->getMessage();
        }
        while($data = $resultset->fetch()){
            try{
                $_array[] = $data;
            }
             catch(PDOException $e){
            print $e->getMessage();
        }   
           }
           return $_array;
        
    }

}


