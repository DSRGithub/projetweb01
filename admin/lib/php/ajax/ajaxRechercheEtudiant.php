<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/connexion.class.php';
require '../classes/Etudiant.class.php';
require '../classes/EtudiantDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
    $search = new EtudiantDB($cnx);
    $retour = $search->getEtudiant($_GET['adresse_mail'],$_GET['mot_de_passe']);    
    print json_encode($retour);    
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}

