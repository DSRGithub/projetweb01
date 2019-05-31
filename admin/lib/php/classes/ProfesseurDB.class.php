<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of ProfesseurDB
 *
 * @author David
 */
class ProfesseurDB {
      private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
    
    public function AddProfesseur($data){
        //$_db->beginTransaction();
        try{
            $query="insert into professeurs ";
            $query.=" (nom)";
            $query.=" values(:nom)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':nom',$data['nom']);
           
            $resultset->execute();
            print "Insertion effectuée!!!!";
        }
        catch(PDOException $e){
            print "Echec de l'insertion ".$e->getMessage();
        }
        //var_dump($data);
       // $_db->commit();
    }
    
    
    
    public function getProfesseur(){
        try{
            $query = "select * from professeurs";
            $resultset = $this->_db->prepare($query);
            //$resultset->bindValue(':login',$login);
            //$resultset->bindValue(':password',$password);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = ($data);
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
