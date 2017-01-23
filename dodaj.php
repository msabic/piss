<?php include'header.php';?>
<link rel="stylesheet" href="assets/style.css"/>
<script src="assets/upload.js"></script>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="localhost/piss">Home</a> / Register</span>
    <h2>Dodaj kuću</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
<?php echo'<form action="dodaj_kucu.php" method="POST">
                <input type="text" class="form-control" placeholder="Naziv" name="naziv">
                <input type="text" class="form-control" placeholder="Adresa" name="adresa">
                <input type="text" class="form-control" placeholder="Grad" name="grad">
                <input type="number" class="form-control" placeholder="Kvadratura" name="kvadratura">
                <input type="number" class="form-control" placeholder="Cijena po danu" name="cijena">
                <input type="number" class="form-control" placeholder="Broj katova" name="br_katova">
                <input type="number" class="form-control" placeholder="Broj Soba" name="br_soba">
                <label><input type="radio" name="bazen"> Bazen </label>
                <textarea rows="6" class="form-control" placeholder="Opišite kuću" name="form_message"></textarea>
                
 
  Odaberite slike: <input type="file" name="img" multiple>

      <button type="submit" class="btn btn-success" name="Submit">Register</button></form>'?>
          


                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>