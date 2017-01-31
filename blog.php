<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Početna</a> / Ponuda</span>
    <h2>Ponuda</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer blog">
<div class="row">
  <div class="col-lg-8 col-sm-12 ">

  <!-- blog list -->
  <?php
  include ("Connect.php");
  $query = "SELECT idnekretnina, naziv, opis FROM `nekretnina` ORDER BY cijena";
  $result = $con->query($query);
  while($row = mysqli_fetch_array($result))
    {
        $id = $row['idnekretnina'];
        $naziv = $row['naziv'];
        $opis = $row['opis'];
        $quer = "SELECT `lokacija` FROM `slike` WHERE `nekretnina_idnekretnina`=".$id."";
                    $resulte = $con->query($quer);
                    while($rez=$resulte->fetch_array())
                    {
                    $slika=$rez['lokacija'];
  

                    }
        
    
		  echo '<div class="row">
                    <div class="col-lg-4 col-sm-4 "><a href="blogdetail.php" class="thumbnail"><img src="'.$slika.'"/></a></div>
                    <div class="col-lg-8 col-sm-8 ">
                    <h3><a href="property-detail.php?id='.$id.'">'. $naziv .'</a></h3>                      
                    <p>'. $opis .'</p>
                    <a href="property-detail.php?id='.$id.'" class="more">Pogledaj detalje</a>
                    </div>
		  </div> ';
  	}
  ?>






  </div>
  <div class="col-lg-4 visible-lg">



  </div>
</div>
</div>
</div>

<?php include'footer.php';?>