<div class="panel panel-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?php
    include ('lib/php/verifier_connexion.php');
    //PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_GET['submit'])) {
        extract($_GET,EXTR_OVERWRITE);
        if(empty($id_professeur)||empty($date)||empty($heure_debut)||empty($heure_fin)){
            $erreur="<span class='txtRouge txtGras'> Veuillez remplir tous les champs</span>";
        }
        else{
            $ad=new AbsencesDB($cnx);
            $retour=$ad->AddAbsence($_GET);
        }
    }
    ?>
<hgroup>
  <h3 class="aligner txtGras">Entrez les informations de l'absence</h3>
  </hgroup>
<div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
                                   <div class="row register-form">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <input type="int" class="form-control" placeholder="id du professeur" value="" name="id_professeur" id="id_professeur" title="Entrez id du professeur"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="date" value="" name="date" id="date" title="Entrez la date de l'absence"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="time" class="form-control" placeholder="heure_debut " value="" name="heure_debut" id="heure_debut" title="Entrez l'heure de debut "  required />
                                        </div>
                                         <div class="form-group">
                                            <input type="time" class="form-control" placeholder="heure_fin " value="" name="heure_fin" id="heure_fin" title="Entrez l'heure de fin"  required />
                                        </div>
                                        <input type="submit" class="btnRegister" name="submit" id="submit" value="Enregistrer"/>
                                    </div>
                                  </div>
								 </form>
                            </div>
                          </div>
                        </div>
                    </div>
    
                </div>
<br/><br/><br/><br/>
<hgroup>
    <h3 class="aligner txtGras">Liste professeur</h3>
</hgroup>

<?php

//récupération des elements professeur
$professeur = new ProfesseurDB($cnx);
$liste = array();
$liste = null;
$liste = $professeur->getProfesseur();
$nbr = count($liste);
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th scope="col"><span style="color:black;">id_professeur</span></th>
                    <th scope="col"><span style="color:black;">nom</span></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr; $i++) {?>
                <tr>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['id_professeur'] . " ";?></span>
                   <td><span style="color:red;"><?php print " " . $liste[$i]['nom'] . " ";?></span>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>

</div>