<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
<!--<h3 class="aligner txtGras">Inscription :</h3>-->
<?php
if (isset($_GET['submit_inscription'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (empty($nom) || empty($prenom) || empty($adresse_mail) || empty($mot_de_passe)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $cl = new EtudiantDB($cnx);
        $retour = $cl->addEtudiant($_GET);
        print "Inscription reussie ! <br/>";
    } 
    
         
    //var_dump($_GET);
}


if (isset($erreur))
    print $erreur;
?>


<!--<span class="txtGras">Veuillez entrer vos coordonnées :</span> <br/><br/>-->

<div class="container">

    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_inscription">
        <!--<div class ="form-group">

            <br/>


            <label for="nom">Votre nom :</label>
            <input type="text" name="nom" id="nom" />
            <br/>

            <label for="prenom">Votre prénom :</label>
            <input type="text" name="prenom" id="prenom"/>
            <br/>

            <br/>
            <label for="adresse_mail">Email :</label>               
            <input type="email" id="adresse_mail" name="adresse_mail" placeholder="aaa@bbb.cc"  />
            <br/>

            <label  for="mot_de_passe">Mot de passe : </label>
            <input type="password" name="mot_de_passe" id="mot_de_passe"/>
            <br/>
        
            <br/>
            <br/>

            <input type="submit" name="submit_inscription" id="submit_inscription" value="Enregistrez-vous !"/>
            <input type="reset" id="reset" value="Annuler"/>

        </div>-->
        <div class="signup-form">
    
		<h2>Inscription</h2>
		<p>Veuillez entrer vos coordonnées :</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" id="nom" class="form-control" name="nom" placeholder="Nom" required="required">
			</div>
        </div>
          <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" id="prenom" class="form-control" name="prenom" placeholder="Prenom" required="required">
			</div>
        </div>        
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="email" id="adresse_mail" class="form-control" name="adresse_mail" placeholder="aaa@bbb.cc" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password"  id="mot_de_passe" class="form-control" name="mot_de_passe" placeholder="Mot de passe" required="required">
			</div>
        </div>
	
		<div class="form-group">
            <button type="submit" name="submit_inscription" class="btn btn-primary btn-lg" id="submit_inscription">Enregistrez-vous !</button>
            <button type="reset" class="btn btn-primary btn-lg" id="reset">Annuler</button>
        </div>
    
	<div class="text-center">Vous avez deja un compte? <a href="./index.php?page=login_c.php">Connexion ici</a></div>
</div>
        
        
    </form>

</div>
</div>

