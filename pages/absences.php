 <hgroup>
    <h3 class="aligner txtGras">Liste absences</h3>
</hgroup>

<?php
include ('./lib/php/verifier_connexion_etudiant.php');
//récupération des elements pour la liste déroulante
$typ = new Vue_absencesDB($cnx);
$types = $typ->getAllAbsences();
$nbr_type = count($types);
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
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                    <th scope="row"><span style="color:white;"><?php print $types[$i]->passage_codeid;?></span></th>
                    <td><span style="color:white;"><?php  print $types[$i]->nom; ?></span></td>
                    <td><span style="color:white;"><?php print $types[$i]->lettre; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->numero; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->intitule; ?></span></td>
                    <td><span style="color:white;"><?php print $types[$i]->date; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->date_debut; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->heure_fin; ?></span></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>