<?php

$host = 'ip-50-62-72-219.ip.secureserver.net';
$usuario = 'bmejia';
$pass = 'bmejia';

$conn = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');
mysql_query("SET NAMES 'utf8'");

$bdnombre = 'narisol_bladi';
mysql_select_db("narisol_bladi");

?>
    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Google Maps</title>
        <style type="text/css">
            body { font: normal 10pt Helvetica, Arial; }
            #map { width: 350px; height: 300px; border: 0px; padding: 0px; }
        </style>
        <!--<script src="http://maps.google.com/maps/api/js?key=AIzaSyBYUnbpWcaSfD7u1jHkM1UemYgEGVRh6Xk" type="text/javascript"></script>-->
        <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBYUnbpWcaSfD7u1jHkM1UemYgEGVRh6Xk&sensor=TRUE_OR_FALSE">
    </script>

        <script type="text/javascript">
            //Sample code written by August Li
            var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
                       new google.maps.Size(32, 32), new google.maps.Point(0, 0),
                       new google.maps.Point(16, 32));
            var center = null;
            var map = null;
            var currentPopup;
            var bounds = new google.maps.LatLngBounds();
            function addMarker(lat, lng, info) {
                var pt = new google.maps.LatLng(lat, lng);
                bounds.extend(pt);
                var marker = new google.maps.Marker({
                    position: pt,
                    icon: icon,
                    map: map
                });
                var popup = new google.maps.InfoWindow({
                    content: info,
                    maxWidth: 300
                });
                google.maps.event.addListener(marker, "click", function() {
                    if (currentPopup != null) {
                        currentPopup.close();
                        currentPopup = null;
                    }
                    popup.open(map, marker);
                    currentPopup = popup;
                });
                google.maps.event.addListener(popup, "closeclick", function() {
                    map.panTo(center);
                    currentPopup = null;
                });
            }           
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(0, 0),
                    zoom: 14,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                    },
                    navigationControl: true,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.ZOOM_PAN
                    }
                });
<?php
$query = mysql_query("SELECT * FROM markers")or die(mysql_error());
while($row = mysql_fetch_array($query))
{
  $name = $row['name'];
  $lat = $row['lat'];
  $lon = $row['lng'];
  $desc = $row['desc'];



  echo("addMarker($lat, $lon, '<b>$name</b><br />$desc');\n");

}

?>
 center = bounds.getCenter();
     map.fitBounds(bounds);

     }
     </script>
     </head>
     <body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
     <div id="map"></div>
     </body>
     </html>