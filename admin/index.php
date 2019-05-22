<?php
session_start(); //ADMIN
include ('./lib/php/verifier_connexion.php');
?>
<!doctype html>
<?php
require './lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> <!-- Ne pas enlever l'intégrité sinon le tableau éditable ne fonctionne plus-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="./lib/js/jquery.editable.js"></script> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
        <script src="./lib/js/fonctionsJqueryDA.js"></script> <!--javascript-->
        <link rel="stylesheet" type="text/css" href="lib/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/custom.css"/>
        <title></title>
    </head>
    <body>
        <header>
            <div class="container">
                <?php
                if(file_exists('./lib/php/a_menu.php')){
                    require './lib/php/a_menu.php';
                }
                ?>
            </div>
        </header>
        <section id="main">
            <div class="container">
                <?php
                if(!isset($_SESSION['page'])){ //premiere ouverture du site
                    $_SESSION['page']="accueil.php";//page par défaut
                }                
                if(isset($_GET['page'])){
                    //on a cliqué sur un lien de menu
                    $_SESSION['page']=$_GET['page'];
                }
                $path = "./pages/".$_SESSION['page'];
                if(file_exists($path)){
                    include ($path);
                }else {
                    include ('./pages/page404.php'); //remplacer par page spécifique
                }
               
                
                ?>
            </div>
        </section>
        <footer>
            <div class="container text-center" id="footer">
                <?php
                if ('./pages/Footer.php') {
                  
                include ('./pages/Footer.php');
                
                }
                
                ?>
            </div>
        </footer>


    </body>
</html>

