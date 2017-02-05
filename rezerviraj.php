
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>

<?php include('header.php');?>
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="localhost/piss">Home</a> / Register</span>
    <h2>Rezerviraj kuću</h2>

</div>
</div>

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
<div class="container">
<div class="spacer">
<div class="row register">
<h2>Kuća koju želite iznajmiti</h2>
<?php
include("Connect.php");
$query = "SELECT * FROM `nekretnina` where idnekretnina=".$_GET['id']." ";
$id=$_GET['id'];
$result = $con->query($query);
while ($rez=$result->fetch_array()){
$naziv=$rez['naziv'];
$broj_katova=$rez['broj_katova'];
$broj_soba=$rez['broj_soba'];
$kvadratura=$rez['kvadratura'];
$bazen=$rez['bazen'];
}
$q="SELECT * FROM `vlasnik_nekretnine` where idnekretnina=".$_GET['id']." ";
$resulte=$con->query($q);
while($rez=$resulte->fetch_array())
{
	$id_vlasnik=$rez['korisnik_idkorisnik'];

}
$qi="SELECT * FROM `korisnik` where idkorisnik=".$id_vlasnik." ";
$resultee=$con->query($qi);
while ($rez=$resultee->fetch_array()) {

	$ime=$rez['ime'];
	$prezime=$rez['prezime'];
	$tel=$rez['kontakt_broj'];
	$email=$rez['email'];
}
$qii="SELECT * FROM `slike` where nekretnina_idnekretnina=".$_GET['id']." ";
$resulteee=$con->query($qii);
while($rez=$resulteee->fetch_array())
{
	$slika=$rez['lokacija'];

}



?>

<?php


echo'<h4>Odaberite datum od kad do kad želite rezervirati kuću!</h4>
<div>
    <form action="rezervacija.php" method="GET">
    <input type="date" class="form-control" name="pocetak"/>
    <input type="date" class="form-control" name="kraj"/>
    <input type="hidden" name="idnek" value="'.$id.'"/>
    <button class="btn btn-success" type="submit">Rezerviraj</button></form>
</div>';


echo '
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.11.1.js"></script>
    <!-->
    <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.11.1.js"></script>
    <!-- -->
    
    <!-- loads mdp -->
    <script type="text/javascript" src="jquery-ui.multidatespicker.js"></script>
    ';


$lista_datuma=['02/02/2017','03/02/2017'];


function datumi($niz) {
    $z = "";
    $j=count($niz);
    for($i = 0; $i<$j;$i++){
        $z = $z ."'". $niz[$i]."'".",";
    }
    $z = rtrim($z , ",");
    return $z;
}
echo"
  <div id='kalendar'>
      <script type='text/javascript'>
      var date = new Date();
       $('#kalendar').multiDatesPicker({
    addDisabledDates: [".datumi($lista_datuma)."]   
});
      </script>

      
  </div>";
  echo'<div>';include("plati.php");echo'</div>';


?>

</div>
</div>
</div>

<?php include('footer.php');?>