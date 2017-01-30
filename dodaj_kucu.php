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
$naziv=isset($_POST["naziv"])? $_POST["naziv"]:"";
$adresa=isset($_POST["adresa"])? $_POST["adresa"]:"";
$grad=isset($_POST["grad"])? $_POST["grad"]:"";
$kvadratura=isset($_POST["kvadratura"])? $_POST["kvadratura"]:"";
$cijena=isset($_POST["cijena"])? $_POST["cijena"]:"";
$br_katova=isset($_POST["br_katova"])? $_POST["br_katova"]:"";
$br_kvadrata=isset($_POST["br_soba"])? $_POST["br_soba"]:"";
$bazen=isset($_POST["bazen"])? $_POST["bazen"]:"";
$form_message=isset($_POST["form_message"])? $_POST["form_message"]:"";
/*$img=$_FILES["img"]["size"]? addslashes(file_get_contents($_FILES["img"]["tmp_name"])) : NULL;*/


$id_korisnika=0;
$id_nekretnina=0;
$email=$_COOKIE['uname'];
$qiii="SELECT * FROM korisnik WHERE email='$email'";
$result=$con->query($qiii);
while ($rez=$result->fetch_array()){
	$id_korisnika=$rez['idkorisnik'];
	}

$qi = "Insert into nekretnina(naziv, adresa, grad, kvadratura, cijena, broj_katova, broj_soba, opis) VALUE ('$naziv', '$adresa' ,'$grad', '$kvadratura', '$cijena', '$br_katova', '$br_kvadrata', '$form_message')";
print $con->query($qi) ? "<script>alert('Uspješno ste se dodali kuću!')</script>" : "<script>alert('Greska')</script>";
$qiiii="SELECT * FROM nekretnina WHERE naziv='$naziv'";
$result=$con->query($qiiii);
while ($rez=$result->fetch_array()){
	$id_nekretnina=$rez['idnekretnina'];
	}
for($i=0; $i<count($_FILES["img"]["tmp_name"]); $i++)
{
	$filetmp=$_FILES["img"]["tmp_name"][$i];
	$filename=$_FILES["img"]["name"][$i];
	$filetyp=$_FILES["img"]["type"][$i];
	$filepath="photo/".$filename;
	move_uploaded_file($filetmp, $filepath);

	$qv="INSERT INTO slike(lokacija, ime, tip, nekretnina_idnekretnina) values ('$filepath','$filename','$filetyp','$id_nekretnina')";
	$con->query($qv) ;
}
$qii="Insert into vlasnik_nekretnine( idnekretnina, korisnik_idkorisnik, korisnik_prijava_idprijava) VALUE ( '$id_nekretnina','$id_korisnika','$id_korisnika')";
$con->query($qii) ;

echo" <script type=\"text/javascript\">function closeWindow() {
    setTimeout(function() {
    window.close();
    },0);
    }

    window.onload = closeWindow();
    </script>";
$con->close();

?>

<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss">

