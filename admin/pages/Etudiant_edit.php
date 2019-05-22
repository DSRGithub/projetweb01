<h3 class="aligner txtGras">Tableau éditable des membres inscrits sur mon site</h3>
<?php
include ('lib/php/verifier_connexion.php');

//récupération des etudiants
$etudiant = new EtudiantDB($cnx);
$liste = array();
$liste = null;
$liste=$etudiant->getAllEtudiant();
$nbr=count($liste);
?>
<br/>

<h2 id="titre">tableau dynamique etudiant</h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">id_Etudiant</th>
            <th class="ecart">nom</th>
            <th class="ecart">prenom</th>
            <th class="ecart">adresse_mail</th>
            <th class="ecart">mot_de_passe</th>
         
            
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
        <tr>
                <td class="ecart"><?php print $liste[$i]['id_etudiant']; ?></td>
                
                <td><span contenteditable="true" name="nom" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['nom']; ?></span>
                </td>
                <td><span contenteditable="true" name="prenom" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['prenom']; ?></span>
                </td>
                               
                <td><span contenteditable="true" name="adresse_mail" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['adresse_mail']; ?></span>
                </td>
                <td><span contenteditable="true" name="mot_de_passe" class="ecart" id="<?php print $liste[$i]['id_etudiant']; ?>">
                        <?php print $liste[$i]['mot_de_passe']; ?></span>
                </td>
               
        </tr>
            <?php
        }
        ?>
    </table>  
</div>


