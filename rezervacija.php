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

$qiii='SELECT idkorisnik FROM korisnik WHERE email="'.$email.'"';
$result=$con->query($qiii);
while($rez=$result->fetch_array()){
	$id_kor=$rez['idkorisnik'];
}

	
$pd=date('Y-m-d', strtotime($poc));
$kd=date('Y-m-d', strtotime($kraj));

$query = "INSERT INTO rezervacija(pocetak_rezervacije, kraj_rezervacije, id_korisnik, id_nekretnina) values ('$pd','$kd','$id_nek','$id_kor')";
$con->query($query);

echo' <script type=\"text/javascript\">function closeWindow() {
    setTimeout(function() {
    window.close();
    },0);
    }
	
    window.onload = closeWindow();
    </script>
    <META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss/">';
$con->close();

?>
