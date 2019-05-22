 <hgroup>
    <h3 class="aligner txtGras">Liste absences</h3>
</hgroup>

<?php
include ('lib/php/verifier_connexion_etudiant.php');
//récupération des elements pour la liste déroulante
$vue = new vue_absences_professeurs_local_cours($cnx);
$liste = array();
$liste = null;
$liste = $vue->getAllAbsences();
$nbr = count($liste);
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th scope="col"><span style="color:white;">nom</span></th>
                    <th scope="col"><span style="color:white;">lettre</span></th>
                    <th scope="col"><span style="color:white;">numero</span></th>
                    <th scope="col"><span style="color:white;">intitule</span></th>
                    <th scope="col"><span style="color:white;">date</span></th>
                    <th scope="col"><span style="color:white;">heure_debut</span></th>
                    <th scope="col"><span style="color:white;">heure_fin</span></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr; $i++) {?>
                <tr>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['nom'] . " ";?></span>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['lettre'] . " ";?></span>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['numero'] . "  ";?></span>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['intitule'] . " ";?></span>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['date'] . " ";?></span>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['heure_debut'] . "  ";?></span>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['heure_fin'] . " ";?></span>
                   
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>