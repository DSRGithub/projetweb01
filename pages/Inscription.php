<h3 class="aligner txtGras">Inscription :</h3>
<?php
if (isset($_GET['submit_inscription'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (empty($nom) || empty($prenom) || empty($adresse_mail) || empty($mot_de_passe)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $cl = new EtudiantDB($cnx);
        $retour = $cl->addEtudiant($_GET);
        print "Insertion dans la base de données réussie ! <br/>";
        
    }
    //var_dump($_GET);
}
if (isset($erreur))
    print $erreur;
?>


<span class="txtGras">Veuillez entrer vos coordonnées :</span> <br/><br/>

<div class="container">

    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_inscription">
        <div class ="form-group">
            
        <br/>
        
        <label for="email1">Email :</label>               
        <input type="email" id="adresse_mail1" name="adresse_mail1" placeholder="aaa@bbb.cc"/>
        <br/>
        

        <label for="email2">Email vérification :</label>               
        <input type="email" id="adresse_mail2" name="adresse_mail2" placeholder="aaa@bbb.cc"/>
        <br/>

        <label  for="mdp">Mot de passe : </label>
        <input type="password" name="mot_de_passe" id="mot_de_passe"/>
        <br/>
        
        <label for="nom">Votre nom :</label>
        <input type="text" name="nom" id="nom" />
 
        <br/>

        <label for="prenom">Votre prénom :</label>
        <input type="text" name="prenom" id="prenom"/>
        <br/>

        <br/>
        <br/>

        <input type="submit" name="submit_inscription" id="submit_inscription" value="Enregistrez-vous !"/>
        <input type="reset" id="reset" value="Annuler"/>

        </div>

    </form>

</div>


