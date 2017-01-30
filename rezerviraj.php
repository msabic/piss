


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
<?php

<<<<<<< HEAD

  include ("Connect.php");
  $query = "SELECT * FROM `nekretnina` where idnekretnina=6";
  $result = $con->query($query);
  for ($j=0; $j<1; ++$j)
{
    $row = mysql_fetch_row($result);
     echo $row[1];
}
=======
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
>>>>>>> origin/master

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