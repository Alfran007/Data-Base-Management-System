<?php
include('dbconnect.php');
// include('searchbus.php');
session_start();
 ?>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
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
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>


    <div id="floating-panel">
        <b>Start: </b>
        <select id="start">
          <option value="<?php echo $_SESSION['from']; ?>"><?php echo $_SESSION['from']; ?></option>
        </select>
        <b>End: </b>
        <select id="end">
          <option value="<?php echo $_SESSION['to']; ?>"><?php echo $_SESSION['to']; ?></option>
        </select>
      </div>


    <div id="map" style="width:80%; margin-left:10%; height:80%;" ></div>
    <script>
        function initMap() {
          var directionsService = new google.maps.DirectionsService;
          var directionsDisplay = new google.maps.DirectionsRenderer;
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: {lat: 26.8851417, lng: 75.6504713}
          });
          directionsDisplay.setMap(map);

          // var onChangeHandler = function() {
            calculateAndDisplayRoute(directionsService, directionsDisplay);
          // };
          document.getElementById('start')
          document.getElementById('end')
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
          directionsService.route({
            origin: document.getElementById('start').value,
            destination: document.getElementById('end').value,
            travelMode: 'DRIVING'
          }, function(response, status) {
            if (status === 'OK') {
              directionsDisplay.setDirections(response);
            } else {
              window.alert('Directions request failed due to ' + status);
            }
          });
        }
      </script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyMcjzj2Cx9U6zbveXAMswK5arrRzMt64&callback=initMap">
      </script>

  </body>
</html>
