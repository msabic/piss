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
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php
include ("Connect.php");
$poc=isset($_GET["pocetak"])? $_GET["pocetak"]:"";
$kraj=isset($_GET["kraj"])? $_GET["kraj"]:"";
$id_nek = ($_GET["idnek"]);
$email=$_COOKIE['uname'];
$br_kartice=($_GET["cardNumber"]);
$datum_kartice=($_GET["cardExpiry"]);
$cardCVC=($_GET["cardCVC"]);
if($poc!="" && $kraj!="" && $id_nek!="" && $br_kartice!="" && $datum_kartice!="" && $cardCVC!="")
{
$qiii='SELECT idkorisnik FROM korisnik WHERE email="'.$email.'"';
$result=$con->query($qiii);
while($rez=$result->fetch_array()){
	$id_kor=$rez['idkorisnik'];
}
$f=true;






global $lista_datuma, $lista_novih_datuma,$k, $a, $l;
$lista_datuma=array();
$lista_novih_datuma=array();
$k=0;
$l=0;

$que="SELECT * FROM `rezervacija` WHERE `id_nekretnina`=".$id_nek."";
$res=$con->query($que);
$pocetak_rezervacije=date("d/m/Y");
$kraj_rezervacije=date("d/m/Y");



while($rez=$res->fetch_array())
{

    
    $pocetak_rezervacije=$rez['pocetak_rezervacije'];
    $kraj_rezervacije=$rez['kraj_rezervacije'];

while($pocetak_rezervacije!=$kraj_rezervacije)
{
    
    $lista_datuma[$k]=date("m/d/Y", strtotime($pocetak_rezervacije));
    $pocetak_rezervacije = date('Y-m-d',strtotime($pocetak_rezervacije) + (24*3600));
    
    $k++;
}

$lista_datuma +=$lista_datuma;

}
$pd=date('Y-m-d', strtotime($poc));
$kd=date('Y-m-d', strtotime($kraj));
while($pd!=$kd)
{
    
    $lista_novih_datuma[$l]=date("m/d/Y", strtotime($pd));
    $pd = date('Y-m-d',strtotime($pd) + (24*3600));
    
    $l++;
}
$lista_novih_datuma+=$lista_novih_datuma;
$f=false;

	for($i=0; $i<count($lista_datuma);  $i++)
	{
		


		for($j=0; $j<count($lista_novih_datuma); $j++)
		{
		if($lista_datuma[$i]==$lista_novih_datuma[$j])
		{
			$f=true;
			break;
		}
	}
	}













if($f==false){
$pd=date('Y-m-d', strtotime($poc));
$kd=date('Y-m-d', strtotime($kraj));

$query = "INSERT INTO rezervacija(pocetak_rezervacije, kraj_rezervacije, id_korisnik, id_nekretnina) values ('$pd','$kd','$id_kor','$id_nek')";
$con->query($query);
echo'<script>alert("Uspješno ste rezervirali kuću!"")</script> ';
echo' <script type=\"text/javascript\">function closeWindow() {
    setTimeout(function() {
    window.close();
    },0);
    }
	
    window.onload = closeWindow();
    </script>
    <META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss">
    ';
 
$con->close();
}
else
{
	echo'<script>alert("Kuća u tom terminu je već rezervirana!")</script>
	<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss/rezerviraj.php?id='.$id_nek.'">
	';

}
}
else
{
	echo'<script>alert("Molimo vas popunite sva polja! Hvala!")</script>
	<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss/rezerviraj.php?id='.$id_nek.'">
	';
}

?>
