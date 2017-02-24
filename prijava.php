
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
function CheckLogin($username,$password){
include("connect.php");
$korisnik=$_POST['email'];
$lozinka=$_POST['lozinka'];
$sql="SELECT * FROM prijava WHERE email='$korisnik' AND lozinka='$lozinka'";
$result=$con->query($sql);
$num_rows=0;
while($row=$result->fetch_array())
{
$num_rows++;
	}
	mysqli_free_result($result);

	if ($num_rows >= 1) {
		return true;
	}
	else {
		return false;
	}
}
function ReturnUserData($username,$password){
	include("connect.php");
	$korisnik=$_POST['email'];
	$lozinka=$_POST['lozinka'];
	$sql="SELECT  email, razina FROM prijava WHERE email='$korisnik'";
	$result=$con->query($sql);
	$rez=array();
	while($ispisrez=$result->fetch_array())
	{
		$rez=$ispisrez;
	}
return $rez;}
?>
<?php
if (isset($_POST["email"])||isset($_POST["lozinka"])){
				$username=$_POST["email"];
				$password=$_POST["lozinka"];
				$postoji=CheckLogin($username,$password);
				
			if ($postoji){
				$rez=array();
				$uname="";
				$razina=0;
				ReturnUserData($username,$password);
				$rez=ReturnUserData($username,$password);
				
				list($uname,$razina)=$rez;
						
				setcookie('uname', $uname, time()+1800,'/');
				setcookie('razina', $razina, time()+1800,'/');
				echo "<script>alert('Uspješno ste se prijavili.')</script>" ;
				include('index.php');
				}
				else{echo "<script>alert('Prijava nije uspjela pokušajte ponovo.');</script>"; 
				include('index.php');}
			
}
			?>
<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/piss">