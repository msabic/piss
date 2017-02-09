
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

global $lista_datuma, $k, $a;
$lista_datuma=array();

$k=0;
?>

<?php
$a=datumi($lista_datuma);

echo '<h4>Odaberite datum od kad do kad želite rezervirati kuću!</h4>
<div>
    <form action="rezervacija.php" method="GET">
    <input type="date" class="form-control" name="pocetak"/>
    <input type="date" class="form-control" name="kraj"/>
    <input type="hidden" name="idnek" value="'.$id.'"/>
     
<div style="float: left;">
     <div id="kalendar" >
      <script type="text/javascript">
      var date = new Date();
       $("#kalendar").multiDatesPicker({
    addDisabledDates: [".datumi($lista_datuma)."]   
});
      </script>

      
  </div>
  </div>
  <div style="float: left; width:50%;">
    <div class="container">
    <div class="row">
        <!-- You can make it whatever width you want. Im making it full width
             on <= small devices and 4/12 page width on >= medium devices -->
        <div class="col-xs-12 col-md-4 col-md-offset-4">
        
        
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    
                    
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                            maxlength="19"
                                            
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs"></span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="month" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="text" 
                                        maxlength="4"
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                        
                                    />
                                </div>
                            </div>
                        </div>
                        
                        
                    
                </div>
            </div>            
            <!-- CREDIT CARD FORM ENDS HERE -->
            
            
        </div>            
        
        
        
    </div>
</div>
</div>
    <button class="btn btn-success" type="submit">Rezerviraj</button></form>
</div>
';



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

$que="SELECT * FROM `rezervacija` WHERE `id_nekretnina`=".$_GET['id']." ";
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
$a=datumi($lista_datuma);
}


function datumi($niz) {
    $z = "";
    $j=count($niz);
    for($i = 0; $i<$j;$i++){
        $z = $z ."'". $niz[$i]."'".", ";
    }
    $z = rtrim($z , ", ");
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
  


?>

</div>
</div>
</div>

<?php include('footer.php');?>