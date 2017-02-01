


<?php include'header.php';?>
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="localhost/piss">Home</a> / Register</span>
    <h2>Rezerviraj kuću</h2>

</div>
</div>


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
echo '
<img src="'.$slika.'"/>
<h4>Vlasnik kuće '.$naziv.' je '.$ime.' '.$prezime.' za više informacija možete se javiti na broj 0'.$tel.' ili na email adresu '.$email.'</h4><br>
<h3>Pojedinosti o kući</h3><br>
<h4>Kvadratura: '.$kvadratura.'</h4>
<h4>Broj katova: '.$broj_katova.'</h4>
<h4>Broj soba: '.$broj_soba.'</h4>';

?>

<?php





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


echo'
  <div id="kalendar">
      <script type="text/javascript">
        $("#kalendar").multiDatesPicker({
        maxPicks: 2,
        minDate: 0
        });
      </script>
      
  </div>';
?>

</div>
</div>
</div>

<?php include'footer.php';?>