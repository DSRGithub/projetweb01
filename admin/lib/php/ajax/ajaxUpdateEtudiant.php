<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Etudiant.class.php';
require '../classes/EtudiantDB.class.php';
$cnx = Connexion::getInstance($dsn,$user,$pass);
try{       
   $update= new EtudiantDB($cnx);
   
   extract($_GET,EXTR_OVERWRITE);
    $parametre = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateEtudiant($champ, $nouveau, $id);
    print json_encode($update);  //permet de retourner à ajax ce qui vient de la bdd.
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode();
}

