<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of LocalDB
 *
 * @author David
 */
class LocalDB {
     private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
    
     public function AddLocal($data){
        //$_db->beginTransaction();
        try{
            $query="insert into local ";
            $query.=" (lettre,numero)";
            $query.=" values(:lettre,:numero)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':lettre',$data['lettre']);
            $resultset->bindValue(':numero',$data['numero']);
            $resultset->execute();
            print "Insertion effectuée!!!!";
        }
        catch(PDOException $e){
            print "Echec de l'insertion ".$e->getMessage();
        }
        //var_dump($data);
       // $_db->commit();
    }
    
    public function getLocal(){
        try{
            $query = "select * from local";
            $resultset = $this->_db->prepare($query);
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
