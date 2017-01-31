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
    <span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>
    <h2>Buy, Sale & Rent</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Traži</h4>
    <?php
    echo '<form action="buysalerent.php" method="GET">
    <input type="text" class="form-control" placeholder="Traži po nazivu grada" name="grad">
    
          <div class="row">
          <div class="col-lg-12">
              <select class="form-control" name="cijena">
                <option value="0">Cijena</option>
                <option value="1">0 KM - 200,000 KM</option>
                <option value="2">200,000 KM - 250,000 KM</option>
                <option value="3">250,000 KM - 300,000 KM</option>
                <option value="4">300,000 KM - više</option>
              </select>
          
          <button class="btn btn-primary">Traži</button></div></div>
</form>
';?>
  </div>



<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>

<?php
  include ("Connect.php");
  $query = "SELECT idnekretnina, naziv, cijena, naziv FROM `nekretnina` ORDER BY cijena DESC LIMIT 4 ";
  $result = $con->query($query);
  while($row = mysqli_fetch_array($result))
    {
        $id = $row['idnekretnina'];
        $naziv = $row['naziv'];
        $n=$row['naziv'];
        $cijena = $row['cijena'];
       $quer = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$id."";
                    $resulte = $con->query($quer);
                    while($rez=$resulte->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    }

echo '
                <div class="col-lg-4 col-sm-5"><img class="img-responsive img-circle" src="'.$slika.'"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php?id='.$id.'">'.$n.'</a></h5>
                  <p class="price">'.$cijena.' KM</p> </div>
              ';}?>
</div></div>
<div class="col-lg-9 col-sm-8">

<div class="row">

<?php
    $cijena1=0;
              $cijena2=0;
    include ("Connect.php");
          if(isset($_GET["grad"]) || isset($_GET["cijena"]))
          {
            $grad=isset($_GET["grad"])? $_GET["grad"]:"";
            $cijena=isset($_GET["cijena"])? $_GET["cijena"]:"";

            if($cijena==1){
              $cijena1=0;
              $cijena2=200000;
            }elseif ($cijena==2) {
              $cijena1=200000;
              $cijena2=250000;
            }elseif ($cijena==3) {
              $cijena1=250000;
              $cijena2=300000;
            }elseif ($cijena==4) {
              $cijena1=300000;
              $cijena2=100000000;
            }


            if($grad!="" && $cijena==0)
            {

              $query = "SELECT idnekretnina, grad, cijena, naziv FROM `nekretnina` WHERE grad = '$grad'";
              $result = $con->query($query);
          while($row = mysqli_fetch_array($result))
            {
                $id = $row['idnekretnina'];
                $naziv = $row['grad'];
                $n=$row['naziv'];
                $cijena = $row['cijena'];
                $query = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$id."";
                    $result = $con->query($query);
                    while($rez=$result->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    }
            echo '
              <div class="col-lg-4 col-sm-6">
              <div class="properties">
                <div class="image-holder"><img class="img-responsive" src="'.$slika.'"/>
                </div>
                <h4><a href="property-detail.php?id='.$id.'">'.$n.'</a></h4>
                <p class="price">Price: '.$cijena.' KM</p>
                
                <a class="btn btn-primary" href="property-detail.php?id='.$id.'">Detalji</a>
              </div>
              </div>'
          ;}
            }

            else if($grad=="" && $cijena!=0)
            {
              $query = "SELECT idnekretnina, grad, cijena, naziv FROM `nekretnina` WHERE cijena >= '$cijena1' and cijena <= '$cijena2'";
              $result = $con->query($query);
              while($row = mysqli_fetch_array($result))
                {
                    $id = $row['idnekretnina'];
                    $naziv = $row['grad'];
                    $n=$row['naziv'];
                    $cijena = $row['cijena'];
                   $quer = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$id."";
                    $resulte = $con->query($quer);
                    while($rez=$resulte->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    } 
                echo '
              <div class="col-lg-4 col-sm-6">
              <div class="properties">
                <div class="image-holder"><img class="img-responsive" src="'.$slika.'"/>
                </div>
                <h4><a href="property-detail.php?id='.$id.'">'.$n.'</a></h4>
                <p class="price">Price: '.$cijena.' KM</p>
                
                <a class="btn btn-primary" href="property-detail.php?id='.$id.'">Detalji</a>
              </div>
              </div>'
                 ;}
              }
              else if($grad!="" && $cijena!=0)
                {
                  $query = "SELECT idnekretnina, grad, cijena FROM `nekretnina` WHERE cijena >= '$cijena1' and cijena <= '$cijena2' and grad ='$grad'";
                  $result = $con->query($query);
                  while($row = mysqli_fetch_array($result))
                    {
                        $id = $row['idnekretnina'];
                        $naziv = $row['grad'];
                        $n=$row['naziv'];
                        $cijena = $row['cijena'];
                        $quer = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$id."";
                    $resulte = $con->query($quer);
                    while($rez=$resulte->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    } 
                    echo '
                  <div class="col-lg-4 col-sm-6">
                  <div class="properties">
                    <div class="image-holder"><img class="img-responsive" src="'.$slika.'"/>
                    </div>
                    <h4><a href="property-detail.php?id='.$id.'">'.$n.'</a></h4>
                    <p class="price">Price: '.$cijena.' KM</p>
                    
                    <a class="btn btn-primary" href="property-detail.php?id='.$id.'">Detalji</a>
                  </div>
                  </div>'
                     ;}
                  }

          }


          else {
          $query = "SELECT idnekretnina, naziv, cijena FROM `nekretnina` ORDER BY cijena";
          $result = $con->query($query);
          while($row = mysqli_fetch_array($result))
            {
                $id = $row['idnekretnina'];
                $naziv = $row['naziv'];
                $n=$row['naziv'];
                $cijena = $row['cijena'];
                $quer = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$id."";
                    $resulte = $con->query($quer);
                    while($rez=$resulte->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    } 
            echo '
              <div class="col-lg-4 col-sm-6">
              <div class="properties">
                <div class="image-holder"><img class="img-responsive" src="'.$slika.'"/>
                </div>
                <h4><a href="property-detail.php?id='.$id.'">'.$n.'</a></h4>
                <p class="price">Price: '.$cijena.' KM</p>
                
                <a class="btn btn-primary" href="property-detail.php?id='.$id.'">Detalji</a>
              </div>
              </div>'
          ;}}

?>
      <!-- properties -->



</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>