<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!--<img src="./admin/images/condorcet.png" alt="logo"/>-->
        <img src="./admin/images/condorcet.png" alt="logoPortee"/>&nbsp;    
        <span class="navbar-toggler-icon"></span>&nbsp;
        <a href="index.php?page=login.php" class="black font-weight-bold">
            <i class="fas fa-key"></i> <!-- ou autre icône -->
        </a>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="" class="navbar-brand collapse navbar-collapse">
            <img src="./admin/images/reports.jpg" alt="Absences" class="topLogo"/>          
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php?page=accueil.php">Accueil<span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Connexion
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./index.php?page=login_c.php">Se connecter</a>
                    <a class="dropdown-item" href="./index.php?page=disconnect.php">Se deconnecter</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Liste des absences
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./index.php?page=absences.php">Professeurs absents</a>
                    <a class="dropdown-item" href="./index.php?page=jquery.php">Notre site</a>
                </div>
            </li>
        </ul>
        <!--
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        -->
    </div>
</nav>
<br/>

