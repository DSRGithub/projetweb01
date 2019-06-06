<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
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
    <!--<div class="form-group" style="margin: 0 auto; border:solid white;border-radius:10px;">
        
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
        

    </div>-->
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Se connecter</div>
                    <div class="card-body">
                        <form action="" method="">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Adresse email</label>
                                <div class="col-md-6">
                                    <input type="email" id="adresse_mail" class="form-control" name="adresse_mail" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="mot_de_passe" class="form-control" name="mot_de_passe" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit_login" class="btn btn-primary">
                                    connexion
                                </button>
                                <a href="index.php?page=Inscription.php" class="btn btn-link">
                                    Vous n'avez toujours pas de compte? Inscrivez-vous !
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
</div>