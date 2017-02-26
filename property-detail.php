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
<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Buy</span>
    <h2>Buy</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>

<?php
  include ("Connect.php");
  $query = "SELECT idnekretnina, naziv, cijena,  naziv FROM `nekretnina` ORDER BY cijena DESC LIMIT 4 ";
  $result = $con->query($query);
  while($row = mysqli_fetch_array($result))
    {
        $id = $row['idnekretnina'];
        $naziv = $row['naziv'];
        $n=$row['naziv'];
        $cijena = $row['cijena'];
       $query = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$id."";
                    $result = $con->query($query);
                    while($rez=$result->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    } 

echo '
                <div class="col-lg-4 col-sm-5"><img class="img-responsive img-circle" src="'.$slika.'"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php?id='.$id.'">'.$n.'</a></h5>
                  <p class="price">'.$cijena.' KM</p> </div>
              ';}?>
</div>



<div class="advertisement">
  <h4>Advertisements</h4>
  <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">
<?php
include ("Connect.php");
$query = "SELECT * FROM `nekretnina` where idnekretnina=".$_GET['id']." ";
$result = $con->query($query);
$row = mysqli_fetch_array($result);


echo '<h2>'.$row['naziv'].'</h2>';
?>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<?php echo'<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
      </ol>
      <div class="carousel-inner">
      ';
      $query = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$_GET['id']."";
                    $result = $con->query($query);
                    while($rez=$result->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    
       
       echo ' <div class="item">
          <img src="'.$slika.'" class="properties" alt="properties" />
        </div>';}
       
echo '<div class="item active">
          <img src="'.$slika.'" class="properties" alt="properties" />
        </div>';
        
      echo '</div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>';?>
<!-- #Slider Ends -->

  </div>
  
<?php
include ("Connect.php");
$q = "SELECT * FROM `vlasnik_nekretnine` where idnekretnina=".$_GET['id']." ";
$result = $con->query($q);
$row = mysqli_fetch_array($result);
$vlasnik_nekretnine=$row['korisnik_idkorisnik'];


$qi="SELECT * FROM `korisnik` where idkorisnik=".$vlasnik_nekretnine."";
$result = $con->query($qi);
while ($rez=$result->fetch_array()){
  $ime=$rez['ime'];
  $prezime=$rez['prezime'];
  $telefon=$rez['kontakt_broj'];

}

$query = "SELECT * FROM `nekretnina` where idnekretnina=".$_GET['id']." ";

$result = $con->query($query);
while ($rez=$result->fetch_array()){
  $id=$rez['idnekretnina'];
  $cijena=$rez['cijena'];
  $broj_katova=$rez['broj_katova'];
  $broj_soba=$rez['broj_soba'];
  $adresa=$rez['adresa'];
  $grad=$rez['grad'];
  $kvadratura=$rez['kvadratura'];
  $baze=$rez['bazen'];
  $opis=$rez['opis'];
  
/*Opis*/
  echo '<div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p>"'.$opis.'"</p></div>';

  /*lokacija*/
 echo '<div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
  </div>';


if(!isset($_COOKIE['uname']))
    { echo'<a style="visibility: hidden" class="btn btn-success" href="rezerviraj.php?id='.$id.'" >Rezerviraj</a>
 </div>';}
 else
 {
   echo'<a class="btn btn-success" href="rezerviraj.php?id='.$id.'" >Rezerviraj</a>
 </div>';
 }

 echo '<div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">'.$cijena.' KM</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> '.$adresa.', '.$grad.', Hrvatska</p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <p>'.$ime.' '.$prezime.'<br>'.$telefon.'</p>
  </div>
</div>

    

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Ime"/>
                <input type="text" class="form-control" placeholder="Email"/>
                <input type="text" class="form-control" placeholder="Telefon"/>
                <textarea rows="6" class="form-control" placeholder="Poruka"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Pošalji</button>
      </form>
 </div>         
</div>
  </div>
  '



;}?>

  

  
 
</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>