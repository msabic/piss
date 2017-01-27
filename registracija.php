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
$ime=isset($_POST["form_name"])? $_POST["form_name"]:"";
$prezime=isset($_POST["form_sname"])? $_POST["form_sname"]:"";
$email=isset($_POST["form_email"])? $_POST["form_email"]:"";
$telefon=isset($_POST["numb"])? $_POST["numb"]:"";
$idpr=1;
$lozinka=isset($_POST["form_phone"])? $_POST["form_phone"]:"";
$oib=isset($_POST["oib"])? $_POST["oib"]:"";
$provjera="";

$qiii="SELECT email FROM prijava WHERE email='$email'";
$result=$con->query($qiii);
while ($rez=$result->fetch_array()){
	$provjera=$rez['email'];
	}


if($ime!="" && $prezime!="" && $email!="" && $telefon!="" && $lozinka!="" && $oib!="" && $provjera=="")
{
$qi = "Insert into prijava(email, razina, lozinka) VALUE ('$email', 1 ,'$lozinka')";
$con->query($qi) ;
$qii="SELECT * FROM prijava WHERE email='$email'";
$result=$con->query($qii);
while ($rez=$result->fetch_array()){
	$idpr=$rez['idprijava'];
	}


$q = "Insert into korisnik( ime, prezime, email, prijava_idprijava, oib, kontakt_broj) VALUES ('$ime', '$prezime', '$email', '$idpr', '$oib', '$telefon')";


print $con->query($q) ? "<script>alert('Uspješno ste se registrirali!')</script>" : "<script>alert('Greska')</script>";

echo' <script type=\"text/javascript\">function closeWindow() {
    setTimeout(function() {
    window.close();
    },0);
    }

    window.onload = closeWindow();
    </script>';
$con->close();
echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss">';
}
else if($provjera!="")
{
	echo'<script>alert("Vaša email adresa se već koristi!")</script>';
	echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss/register.php">';
}
else{
echo'<script>alert("Molimo popunite sva polja!")</script>';
	echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss/register.php">';
}
?>



