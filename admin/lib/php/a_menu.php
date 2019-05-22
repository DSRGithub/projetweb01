<?php
include ('lib/php/verifier_connexion.php');
?>
<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="./images/administrator.png" alt="logo"/>    
        <span class="navbar-toggler-icon"></span>&nbsp;
    </button>
    
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Partie administration</a>
        </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
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
                    Absences 
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">                   
                    <a class="dropdown-item" href=./index.php?page=Absences_edit.php">Liste absences editable</a>
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


