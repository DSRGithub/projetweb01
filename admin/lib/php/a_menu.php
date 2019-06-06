<?php
include ('lib/php/verifier_connexion.php');
?>
<nav class="navbar navbar-expand-md navbar-light" style="background-color: #E68C8C;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="./images/admin.png" width="100" height="100" alt="logo"/>    
        <span class="navbar-toggler-icon"></span>&nbsp;
    </button>
    
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="./index.php?page=accueil.php" class="navbar-brand collapse navbar-collapse">
            Partie adminsitration
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php?page=accueil.php">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown ">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Comptes utilisateurs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./index.php?page=Etudiant_edit.php">Liste etudiant editable</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gestion
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">                   
                    <a class="dropdown-item" href=./index.php?page=ajout_professeur.php">professeur</a>           
                    <a class="dropdown-item" href=./index.php?page=ajout_local.php">local</a>           
                    <a class="dropdown-item" href=./index.php?page=ajout_cours.php">cour</a>                   
                    <a class="dropdown-item" href=./index.php?page=Absences_edit.php">absence</a>
                     <a class="dropdown-item" href=./index.php?page=Absences_editable.php">absences editables</a>
                </div>
            </li>
            
            
           <li class="nav-item">
                    <div >
                        <!--<a class="nav_link" href="index.php?page=disconnect.php">Déconnexion</a>-->
                        <p><a class="btn btn-danger btn-lg" href="index.php?page=disconnect.php" role="button" >Deconnexion</a></p>
                    </div>
           </li> 
           
        </ul>
    </div>
</nav>
<br/>


