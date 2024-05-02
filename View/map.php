<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte Interactive</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="map"></div>
    <style> 
    #map {
    width: 100%;
    height: 400px; /* Ajustez la hauteur comme nécessaire */
    } </style> 



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script>$(document).ready(function(){
    // Vous pouvez utiliser des bibliothèques comme Leaflet.js ou Google Maps API pour rendre la carte interactive
    // Voici un exemple simple d'utilisation de Leaflet.js
    var mymap = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);
    var marker = L.marker([51.5, -0.09]).addTo(mymap);
    marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();});
    </script>
</body>
</html>
