<?php
    include ('lib/php/verifier_connexion.php');
    //PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_GET['submit'])) {
        extract($_GET,EXTR_OVERWRITE);
        if(empty($nom)){
            $erreur="<span class='txtRouge txtGras'> Veuillez remplir tous les champs</span>";
        }
        else{
            $ad=new ProfesseurDB($cnx);
            $retour=$ad->AddProfesseur($_GET);
        }
    }
    ?>
<hgroup>
  <h3 class="aligner txtGras">Entrez le nom du professeur</h3>
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
                                            <input type="text" class="form-control" placeholder="nom du professeur" value="" name="nom" id="nom" title="Entrez le nom du professeur"  required />
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

