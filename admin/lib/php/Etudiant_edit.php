<h3 class="aligner txtGras">Tableau éditable des membres inscrits sur mon site</h3>
<?php
include ('./lib/php/verifier_connexion.php');

//récupération des etudiants
$etudiant = new EtudiantDB($cnx);
$liste = array();
$liste = null;
$liste=$etudiant->getAllEtudiant();
$nbr=count($liste);
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
                
                <td><span contenteditable="true" name="nom" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['nom']; ?></span>
                </td>
                <td><span contenteditable="true" name="prenom" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['prenom']; ?></span>
                </td>
                               
                <td><span contenteditable="true" name="adresse_mail" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['telephone']; ?></span>
                </td>
                <td><span contenteditable="true" name="mot_de_passe" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['mot_de_passe']; ?></span>
                </td>
               
            
            <?php
        }
        ?>
    </table>  
</div>


