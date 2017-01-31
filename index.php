<?php include'header.php';?>
<?php
if (isset($_COOKIE['uname'])){
$prijavljen=true;
$razina=$_COOKIE['razina'];
}
else {
$prijavljen=false;
$razina=0;
}
?>
<div class="">
    

            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><a href="#"></a></h2>
              
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2><a href="#"></a></h2>
              <blockquote>              
              
              
              
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
              
              
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
              
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
              
            </div>
          </div>
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Potraži</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <?php
    echo '<form action="buysalerent.php" method="GET">
    <input type="text" class="form-control" placeholder="Traži po nazivu grada" name="grad">
    
          <div class="row">
          <div class="col-lg-12">
              <select class="form-control" name="cijena">
                <option value="0">Cijena</option>
                <option value="1">0 KM - 200,000 KM</option>
                <option value="2">200,000 KM - 250,000 KM</option>
                <option value="3">250,000 KM - 300,000 KM</option>
                <option value="4">300,000 KM - više</option>
              </select>
          
          <button class="btn btn-primary">Traži</button></div></div>
</form>
';?>
          
          
        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <?php 
    if(!isset($_COOKIE['uname']))
    {
    echo'<p>Prijavi se i potraži kuću iz snova za svoj odmor.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Prijava</button>';}?>       
          <?php 
          if(isset($_COOKIE['uname']))
    {

          echo ' 
          <form action="logout.php" method="POST" >
          <button class="btn btn-info"\>Odjava</button>
          </form>';}?> </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">Pogledaj cijelu ponudu</a>
    <h2>Istaknute nekretnine</h2>
    <div id="owl-example" class="owl-carousel">

    <?php
      include ("Connect.php");
      $query = "SELECT idnekretnina, grad, cijena FROM `nekretnina` LIMIT 7";
                $result = $con->query($query);

                while($row = mysqli_fetch_array($result))
                  { 
                      $id = $row['idnekretnina'];
                      $naziv = $row['grad'];
                      $cijena = $row['cijena'];
                     $query = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$id."";
                    $result = $con->query($query);
                    while($rez=$result->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    }

                      echo '
                        <div class="properties">
                          <div class="image-holder"><img class="img-responsive" src="'.$slika.'"/>
                            
                          </div>
                          <h4><a href="property-detail.php?id='.$id.'">'.$naziv.'</a></h4>
                          <p class="price">'.$cijena.' KM</p>
                          <div class="listing-detail"></div>
                          <a class="btn btn-primary" href="property-detail.php?id='.$id.'">Pogledaj detalje</a>
                        </div>';
                  }
     
     ?>   
      
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>O nama</h3>
        <p>Mi smo studenti prve godine diplomskog studija Fakulteta strojarstva i računarstva u Mostaru. Ovu stranicu smo izradili kao zadatak iz kolegija projektiranje informacijskih sustava. Zadatak nije bio lak zato smo uložili mnogo truda, znoja i kave da ga završimo u roku. Uz rad na ovom projektu mnogo smo naučili o iznajmljivanju kuća odnosno da nikad više ne radimo stranicu za iznajmljivanje kuća...<br><a href="about.php">Saznaj više</a></p>
      
      </div>

    </div>
  </div>
</div>
<?php include'footer.php';?>