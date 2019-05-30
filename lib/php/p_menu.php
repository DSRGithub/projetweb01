<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!--<img src="./admin/images/condorcet.png" alt="logo"/>-->
        <img src="./admin/images/condorcet.png" width="100" height="100" alt="logoPortee"  />&nbsp;    
        <span class="navbar-toggler-icon"></span>&nbsp;
        <a href="index.php?page=login.php" class="black font-weight-bold">
            <i class="fas fa-key"></i> <!-- ou autre icône -->
        </a>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="./index.php?page=accueil.php" class="navbar-brand collapse navbar-collapse">
            <img src="./admin/images/A.jpg" width="30" height="30" alt="Absences" class="d-inline-block align-top"/>
            Absences
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php?page=accueil.php">Accueil<span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
                    <a class="nav-link" href="./index.php?page=absences.php">Professeurs absents</a>
                </li>
            
            <li class="nav-item">
                    <a class="nav-link" href="./index.php?page=jquery.php">A propos de nous !</a>
                </li>
            
            <?php if(empty($_SESSION['etudiant'])){ ?>
             <li class="nav-item">
                    <div >
                        <p><a class="btn btn-outline-primary my-2 my-sm-0" href="./index.php?page=login_c.php" role="button" >Connexion</a></p>
                    </div>
           </li>
            <?php }?>
           
           <?php if(isset($_SESSION['etudiant'])){ ?>
             <li class="nav-item">
                    <div >
                        <p><a class="btn btn-danger btn-lg" href="./index.php?page=disconnect.php" role="button" >Deconnexion</a></p>
                    </div>
           </li>
           <?php }?>
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

