<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->
<script type="text/javascript">

  function checkForm(form)
  {
    if(form.form_phone.value != "" ) {
      if(form.form_phone.value.length < 6) {
        alert("Greška: Lozinka treba biti duljine 6 znakova!");
        form.form_phone.focus();
        return false;
      }
    }
      }</script>

<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
<?php
     echo' <form action="registracija.php" method="POST" onsubmit="return checkForm(this);">
                <input type="text" class="form-control" placeholder="Ime" name="form_name">
                <input type="text" class="form-control" placeholder="Prezime" name="form_sname">
                <input type="number" class="form-control" placeholder="Telefon" name="numb">
                <input type="email" class="form-control" placeholder="Enter Email" name="form_email">
                <input type="password" class="form-control" placeholder="Lozinka" name="form_phone">
                <input type="number" class="form-control" placeholder="OIB" name="oib">
      
               
      <button type="submit" class="btn btn-success" name="Submit">Registriraj se</button></form>';?>
          


                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>