<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
<h2>Login administration</h2>
<?php 
//si on a cliqué sur le bouton d'envoi du formulaire
if(isset($_POST['submit_login'])){
    //pour pouvoir utiliser les données hors tabl $_GET ou $_POST
    extract($_POST,EXTR_OVERWRITE);
    $log = new AdminDB($cnx);
    //$admin et $password sont les noms des champs du formulaire
    $admin = $log->getAdmin($login, $password);
    //var_dump($admin);
    if(is_null($admin)){
        print "<br/>Données incorrectes";        
    }
    else {
        $_SESSION['admin']=1;
        unset($_SESSION['page']);        
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/index.php\">";
    }
    
}
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
  <!--  Login : 
    <input type="text" name="login" id="admin" /><br/>
    Password : <input type="password" name="password" id="password"/>
    <br/>
    <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/>-->
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin</div>
                    <div class="card-body">
                        <form action="" method="">
                            <div class="form-group row">
                                <label for="login" class="col-md-4 col-form-label text-md-right">Login</label>
                                <div class="col-md-6">
                                    <input type="text" id="admin" class="form-control" name="login" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit_login" id="submit_login" class="btn btn-primary">
                                    Se connecter
                                </button>
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



