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
          <input type="text" class="form-control" placeholder="Unesi naziv grada">
          <div class="row">
            <div class="col-lg-3 col-sm-3 ">
              <select class="form-control">
                <option>Sobe</option>
                <option>1 soba</option>
                <option>2 sobe</option>
                <option>3 sobe</option>
                <option>4 i više soba</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select class="form-control">
                <option>Cijena</option>
                <option>200kn - 500kn</option>
                <option>500kn - 1000kn</option>
                <option>1000kn - 2000kn</option>
                <option>2000kn i više</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
            <select class="form-control">
                <option>Kvadratura</option>
                <option>do 100</option>
                <option>100-150</option>
                <option>150 i više</option>
              </select>
              </div>
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success"  onclick="window.location.href='buysalerent.php'">Traži</button>
              </div>
          </div>
          
          
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
      <div class="properties">
        <div class="image-holder"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/>
          
        </div>
        <h4><a href="property-detail.php">Mijina vikendica</a></h4>
        <p class="price">Cijena 5 kuna</p>
        <div class="listing-detail"></div>
        <a class="btn btn-primary" href="property-detail.php">Pogledaj detalje</a>
      </div>
     
        
      
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>O nama</h3>
        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="about.php">Saznaj više</a></p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Preporučene nekretnine</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">More Detail</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>