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
    <span class="pull-right"><a href="#">Home</a> / Kontakt</span>
    <h2>Kontaktirajte nas</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">


                <input type="text" class="form-control" placeholder="Ime">
                <input type="text" class="form-control" placeholder="Email Adresa">
                <textarea rows="6" class="form-control" placeholder="Message"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Pošalji</button>
          


                
        </div>
  <div class="col-lg-6 col-sm-6 ">
  <div class="well"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2901.501324005512!2d17.795941867547022!3d43.34562314257164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134b43baf988f99f%3A0xbb68478e609acfa4!2sFakultet+strojarstva+i+ra%C4%8Dunarstva!5e0!3m2!1shr!2sba!4v1485167129511" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
  </div>
</div>
</div>
</div>

<?php include'footer.php';?>