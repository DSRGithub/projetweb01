<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of CourDB
 *
 * @author David
 */
class CourDB {
      private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
    public function AddCour($data){
        //$_db->beginTransaction();
        try{
            $query="insert into cours ";
            $query.=" (id_professeur,id_local,intitule)";
            $query.=" values(:id_professeur,:id_local,:intitule)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':id_professeur',$data['id_professeur']);
            $resultset->bindValue(':id_local',$data['id_local']);
            $resultset->bindValue(':intitule',$data['intitule']);
            $resultset->execute();
            print "Insertion effectuée!!!!";
        }
        catch(PDOException $e){
            print "Echec de l'insertion ".$e->getMessage();
        }
        //var_dump($data);
       // $_db->commit();
    }
    
    
    public function getCour(){
        try{
            $query = "select * from cour";
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
