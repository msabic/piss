<?php include'header.php';?>
<link rel="stylesheet" href="assets/style.css"/>
<script src="assets/upload.js"></script>

 <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="localhost/piss">Home</a> / Register</span>
    <h2>Dodaj kuću</h2>
</div>
</div>

 <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1v9GwfVESZsR6czrUvVVn2DjiWyVclRg&callback=initMap">
    </script>
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
                
 <div id="map"></div>

  Odaberite slike: <input type="file" name="img" multiple>

      <button type="submit" class="btn btn-success" name="Submit">Register</button></form>'?>
          


                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>