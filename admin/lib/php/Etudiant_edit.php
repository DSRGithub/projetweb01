<h3 class="aligner txtGras">Tableau éditable des membres inscrits sur mon site</h3>
<?php
include ('./lib/php/verifier_connexion.php');

//récupération des etudiants
$liste = array();
$liste = null;
$liste = $vue->getAllEtudiant();
$nbr = count($liste);
?>


<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id_Etudiant</th>
            <th class="ecart">Nom</th>
            <th class="ecart">Prénom</th>
            <th class="ecart">adresse_mail</th>
            <th class="ecart">mot_de_passe</th>
         
            
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            
                <td class="ecart"><?php print $liste[$i]['id_etudiant']; ?></td>
                
                <td><span contenteditable="true" name="Nom" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['nom']; ?></span>
                </td>
                <td><span contenteditable="true" name="Prenom" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['prenom']; ?></span>
                </td>
                               
                <td><span contenteditable="true" name="Adresse_mail" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['telephone']; ?></span>
                </td>
                <td><span contenteditable="true" name="Mot_de_passe" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['mot_de_passe']; ?></span>
                </td>
               
            
            <?php
        }
        ?>
    </table>  
</div>


