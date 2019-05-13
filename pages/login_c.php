<h2>Login etudiant</h2>
<?php
//print "Connexion etudiant";
//si on a cliqué sur le bouton "envoyé" du formulaire
if (isset($_POST['submit_login'])) {
    extract($_POST, EXTR_OVERWRITE);
    $log = new EtudiantDB($cnx);
    $etudiant = $log->getEtudiant($adresse_mail,$mot_de_passe);
    //var_dump($etudiant);
    if (is_null($etudiant)) {
        
        print "</br>Login ou mot de passe incorrect";
    } else {
        $_SESSION['etudiant'] = 1;
        unset($_SESSION['page']);
        print "connexion reussie";
        //print "<meta http-equiv=\"refresh\": Content=\";URL=index.php \">";
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php \">";
    }
}
?>


<form action=" <?php print $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
        
        <h3>Se connecter</h3>
        Login : <input type="email" name="adresse_mail" id="adresse_mail"/></br>
        <br/>
        <br/> 
        Mot de passe : <input type="password" name="mot_de_passe" id="mot_de_passe"/></br>
        <br/>
        <br/>
        <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/>


        <br/>

            Vous n'avez toujours pas de compte?<a href="index.php?page=Inscription.php">Inscrivez-vous</a>
        

    </div>            
</form>