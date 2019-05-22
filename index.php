<?php
session_start();
//INDEX PUBLIC
?>
<!doctype html>
<?php
require './admin/lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Site Absences</title>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/custom.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> <!-- Ne pas enlever l'intégrité sinon le tableau éditable ne fonctionne plus-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="./Admin/lib/js/jquery.editable.js"></script> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
        <script src="./Admin/lib/js/FonctionsJqueryDA.js"></script> <!--javascript-->
      
      
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container">
                <?php
                if (file_exists('./lib/php/p_menu.php')) {
                    require './lib/php/p_menu.php';
                }
                ?>
                <!--<div class="">
                    <a href="index.php?page=disconnect.php">Deconnexion,</a>
                </div>
                <div class="">
                    <a href="index.php?page=login.php">Administration</a>
                </div>-->
            </div>
        </header>
        <section id="main">
            <div class="container">
                <?php
                if (!isset($_SESSION['page'])) { //premiere ouverture du site
                    $_SESSION['page'] = "accueil.php"; //page par défaut
                }
                if (isset($_GET['page'])) {
                    //on a cliqué sur un lien de menu
                    $_SESSION['page'] = $_GET['page'];
                }
                $path = "./pages/" . $_SESSION['page'];
                if (file_exists($path)) {
                    include ($path);
                } else {
                    include('admin/pages/page404.php'); //remplacer par page spécifique
                }
                ?>
            </div>
        </section>
        <footer>
            <div class="container text-center" id="footer">
                Siège social : Chemin du Champ de Mars, 17 à 7000 Mons - +32 (0) 65/40 12 20
                ©HEPH - Condorcet 2009-2018 | Plan du site | Editeur responsable : Pascal Lambert | Mentions légales
                La Haute Ecole s’engage dans un enseignement supérieur inclusif
            </div>
        </footer>



    </body>
</html>
