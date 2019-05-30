<?php
    include ('lib/php/verifier_connexion.php');
    //PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_GET['submit'])) {
        extract($_GET,EXTR_OVERWRITE);
        if(empty($id_professeur)||empty($id_local)||empty($intitule)){
            $erreur="<span class='txtRouge txtGras'> Veuillez remplir tous les champs</span>";
        }
        else{
            $ad=new CourDB($cnx);
            $retour=$ad->AddCour($_GET);
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
                                            <input type="int" class="form-control" placeholder="id du local" value="" name="id_local" id="id_local" title="Entrez id du local"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="intitule " value="" name="intitule" id="intitule" title="Entrez l'intitule du cour "  required />
                 
                                        <input type="submit" class="btnRegister" name="submit" id="submit" value="Enregistrer"/>
                                    </div>
                                  </div>
								 </form>
                            </div>
                          </div>
                        </div>
                    </div>
    
                </div>

