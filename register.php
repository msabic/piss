<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
<?php
     echo' <form action="registracija.php" method="POST">
                <input type="text" class="form-control" placeholder="Full Name" name="form_name">
                <input type="text" class="form-control" placeholder="Second Name" name="form_sname">
                <input type="number" class="form-control" placeholder="Number" name="numb">
                <input type="email" class="form-control" placeholder="Enter Email" name="form_email">
                <input type="password" class="form-control" placeholder="Password" name="form_phone">
                <input type="password" class="form-control" placeholder="Confirm Password" name="form_phone">
                <input type="number" class="form-control" placeholder="OIB" name="oib">
      
                <textarea rows="6" class="form-control" placeholder="Address" name="form_message"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Register</button></form>';?>
          


                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>