
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

  <script>

  $(document).ready(function() {
    $("#datepicker").datepicker();
  });

  </script>


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

  <form action="sample.php" method="post">

Start Date: <input type="text" name="startdate" id="datepicker"/>
End Date: <input type="text" name="enddate" id="datepicker"/>
<input type="submit" />
</form>

</div>
</div>
</div>

<?php include'footer.php';?>