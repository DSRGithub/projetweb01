
<!DOCTYPE html>
<html>
    <head></head>
    <body><div class="">
        <?php if(empty($_SESSION['etudiant'])){ ?>
     <div class="jumbotron col-xs-12 col-sm-12 col-md-10 col-lg-12">       
          <a class="btn btn-danger btn-lg" href="index.php?page=Inscription.php" role="button" >Inscription</a>
          <a class="btn btn-danger btn-lg" href="index.php?page=login.php" role="button" >Administration</a>
     </div> 
        <?php }?>
    <!--<p><a class="btn btn-danger btn-lg" href="index.php?page=disconnect.php" role="button" >Deconnexion</a></p>-->
</div>
    <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./admin/images/img_4.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Bien planifier son etude</h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./admin/images/absence.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./admin/images/ecole.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Condorcet à Mons</h5>
          <p></p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>    
</body>
</html>