<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
<?php
     include ('lib/php/verifier_connexion.php');
    //PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_GET['submit'])) {
        extract($_GET,EXTR_OVERWRITE);
        if(empty($lettre)||empty($numero)){
            $erreur="<span class='txtRouge txtGras'> Veuillez remplir tous les champs</span>";
        }
        else{
            $ad=new LocalDB($cnx);
            $retour=$ad->AddLocal($_GET);
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
                                            <input type="text" class="form-control" placeholder="lettre du local" value="" name="lettre" id="lettre" title="Entrez la lettre du local"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="int" class="form-control" placeholder="numero du local" value="" name="numero" id="numero" title="Entrez le numero du local"  required />
                                        </div>&nbsp;
                                        <input type="submit" class="btnRegister" name="submit" id="submit" value="Enregistrer"/>
                                    </div>
                                  </div>
								 </form>
                            </div>
                          </div>
                        </div>
                    </div>
    
                </div>
</div>