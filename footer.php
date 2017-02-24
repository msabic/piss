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


<div class="footer">

<div class="container">



<div class="row">
            <div class="col-lg-3 col-sm-3">
                   <h4>Informacije</h4>
                   <ul class="row">
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.php">O nama</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.php">Agenti</a></li>         
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.php">Ponuda</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.php">Kontakt</a></li>
              </ul>
            </div>
            
            
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Pratite nas</h4>
                    <a href="https://www.facebook.com/" target="blank"><img src="images/facebook.png" alt="facebook"></a>
                    <a href="https://www.twitter.com" target="blank"><img src="images/twitter.png" alt="twitter"></a>
                    <a href="https://www.linkedin.com" target="blank"><img src="images/linkedin.png" alt="linkedin"></a>
                    <a href="https://www.instagram.com" target="blank"><img src="images/instagram.png" alt="instagram"></a>
            </div>

             <div class="col-lg-3 col-sm-3">
                    <h4>Kontaktirajte <noframes></noframes></h4>
                    <p><b>HouseRent</b><br>
<span class="glyphicon glyphicon-map-marker"></span>Uzbrdo nizbrdo bb. <br>
<span class="glyphicon glyphicon-envelope"></span> houserent@fsr.com<br>
<span class="glyphicon glyphicon-earphone"></span> #31#063/661-531</p>
            </div>
        </div>
<p class="copyright">Copyright 2017. Sva prava pripadaju nama.	</p>


</div></div>




<!-- Modal -->
<div id="loginpop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      
     
      <div class="row">
        <div class="col-sm-6 login">
        <h4>Login</h4>
          
          

          <?php echo' <form action="prijava.php" method="POST">
<form class="" role="form">
         <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="lozinka">
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>  </form></form> ';?>
        
        </div> 



        <div class="col-sm-6">
          <h4>New User Sign Up</h4>
          <p>Join today and get updated with all the properties deal happening around.</p>
          <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'"">Join Now</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.modal -->



</body>
</html>



