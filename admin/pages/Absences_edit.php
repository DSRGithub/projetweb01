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
  <h3 class="aligner txtGras">Entrez les informations sur le local</h3>
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
