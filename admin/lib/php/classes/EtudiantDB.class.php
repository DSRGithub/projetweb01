<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of EtudiantDB
 *
 * @author David
 */
class EtudiantDB extends Etudiant{
        private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
    
    public function addEtudiant(array $data) {
        $query = "select ajouter_client(:nom,:prenom,:adresse_mail,:mot_de_passe) as retour";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom',$data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom',$data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse_mail',$data['adresse_mail'], PDO::PARAM_STR);
            $resultset->bindValue(':mot_de_passe',$data['mot_de_passe'], PDO::PARAM_STR);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0);
            
            return $retour;
        }catch(PDOException $e){
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
        
    }


    
    
    public function getEtudiant($adresse_mail,$mot_de_passe){
        try{
            $query = "select * from etudiant where adresse_mail=:adresse_mail and mot_de_passe=:mot_de_passe";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':adresse_mail',$adresse_mail ,PDO::PARAM_STR);
            $resultset->bindValue(':mot_de_passe',$mot_de_passe , PDO::PARAM_STR);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Etudiant($data);
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
    
      public function updateEtudiant($champ,$nouveau,$id){        
        
        try {
          
            $query="UPDATE etudiant set ".$champ." = '".$nouveau."' where id_etudiant ='".$id."'";            
           // var_dump($id);
            $resultset = $this->_db->prepare($query);
            print $query;
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
   
}
public function getAllEtudiant(){
        $query = "select * from etudiant";
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
