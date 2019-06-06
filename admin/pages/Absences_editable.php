<div class="panel panel-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3 class="aligner txtGras">Tableau éditable absences</h3>
<?php
  include ('lib/php/verifier_connexion.php');
//récupération des absences
$absence = new absencesDB($cnx);
$liste = array();
$liste = null;
$liste=$absence->getAbsences();
$nbr=count($liste);
?>
<br/>

<h2 id="titre">Modifier date et heure absence ici</h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">id_Absence</th>
            <th class="ecart">id_Professeur</th>
            <th class="ecart">Date</th>
            <th class="ecart">Heure_debut</th>
            <th class="ecart">Heure_fin</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
        <tr>
                <td class="ecart"><?php print $liste[$i]['id_absence']; ?></td>
                
               
                <td><span contenteditable="false" name="id_professeur" class="ecart" id="<?php print $liste[$i]['id_absence']; ?>">
                        <?php print $liste[$i]['id_professeur']; ?></span>
                </td>             
                <td><span contenteditable="true" name="date" class="ecart" id="<?php print $liste[$i]['id_absence']; ?>">
                        <?php print $liste[$i]['date']; ?></span>
                </td>
                <td><span contenteditable="true" name="heure_debut" class="ecart" id="<?php print $liste[$i]['id_absence']; ?>">
                        <?php print $liste[$i]['heure_debut']; ?></span>
                </td>           
                <td><span contenteditable="true" name="heure_fin" class="ecart" id="<?php print $liste[$i]['id_absence']; ?>">
                        <?php print $liste[$i]['heure_fin']; ?></span>
                </td>
        </tr>
            <?php
        }
        ?>
    </table>  
</div>
</div>

