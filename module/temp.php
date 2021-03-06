<?php 
  require ('../vendor/autoload.php');
  require_once ('../config.php');
  require_once ('../session.php');
  require('../components/inc/head.php');
  require('../components/inc/sideBar.php');
  require('../components/inc/footer.php'); 
?>

	<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
  * {
    margin: 0;
    padding: 0;
  }
  .home_content{
      overflow: scroll;
        margin-left: 100px;
    }

  #map{
    height: 500px;
    width: 100%;
  }
  body {
    background-image: url("../assets/background.jpg")
  }
  p.distance{
    border: 2px solid black;
    padding: 5px;
    background-color: red;
  }
  </style>
</head>
<div class="home_content">
  <div class="text">
<div id="map"></div>
<p class = "distance" id="msg"></p>
</div>
  </div>
</html>

<script>
//defines global variables
let map, infoWindow;
var curLoc;
var desLoc;
var markName = "<?php
$test = Print($_GET['locationaddress']);
?>";

//document.getElementById("name").innerHTML = markName;
//defines constant variables
const lubCenter = {lat:33.58438431248001, lng:-101.87831451579754}

const murdoughHall = {lat: 33.58401852803292, lng: -101.88098932860129, name: "Murdough Hall",address: "address 1", info: "info here 1"}
const experimentalSciences = {lat:33.58547469574215, lng: -101.87896067815234, name: "Experemental Sciences",address: "address 2", info: "info here 2"}
const studentUnion = {lat:33.581506115508404, lng:-101.87474868853408 , name: "Student Union Building", address: "address 3", info: "info here 3"}
const allenTheater = {lat:33.58074238119083, lng:-101.878399599592 , name: "Allen Theatre", address: "address 4", info: "info here 4"}
const fraizerPavilion = {lat:33.58982219017173, lng:-101.87462935784677 , name: "Fraizer Pavillion", address: "address 4", info: "info here 4"}
const unitedSuper = {lat:33.5798892481001, lng:-101.8738142271597 , name: "The Commons by United Supermarkets", address: "address 4", info: "info here 4"}
const marketStangle = {lat:33.58382739901434, lng:-101.88044567753988 , name: "The Market at Stangel/Murdough", address: "address 4", info: "info here 4"}
const wiggens = {lat:33.58014751372461, lng:-101.88374291118187 , name: "Wiggins Complex", address: "address 4", info: "info here 4"}

const markerArr = [murdoughHall, experimentalSciences, studentUnion, allenTheater, fraizerPavilion, unitedSuper, marketStangle, wiggens];
//function that initializes the map using googles API
function initMap() {
  var updateBool = 0;
  map = new google.maps.Map(document.getElementById("map"), {
    center: lubCenter,
    zoom: 15,
  });
  infoWindow = new google.maps.InfoWindow();
  search();
  
  geoLocator(map, infoWindow);
}

//function that places a marker on users geolocation on prompt
function geoLocator(map, infoWindow){
  const locationButton = document.createElement("button");

  locationButton.textContent = "Route from current location";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
      curLoc = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      }
      addMarker(curLoc, map, 'You Are Here');
      
      map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    route();
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}
//function that recives location(lat, lng) the map object, and a label
function addMarker(location, map, label){
new google.maps.Marker({
      position: location,
      label: { color: '#00aaff', fontWeight: 'bold', fontSize: '14px', text: label },
      map: map,});
}
//function to work on
function eventFunc(eventInfo){

}
function search(){
  var i = 0
  var input = markName;
  var len = markerArr.length - 1;
  while(i <= len){
    if(input == markerArr[i].name){
      /* document.getElementById("name").innerHTML = markerArr[i].name;
      document.getElementById("address").innerHTML = markerArr[i].address;
      document.getElementById("info").innerHTML = markerArr[i].info; */
      var location = new google.maps.LatLng(markerArr[i].lat, markerArr[i].lng);
      desLoc = {
        lat: markerArr[i].lat,
        lng: markerArr[i].lng,
      }
      var marker = new google.maps.Marker({
        position: location,
        label: { color: '#00aaff', fontWeight: 'bold', fontSize: '14px', text: markerArr[i].name },
        title: markerArr[i].name});
      marker.setMap(map);
      map.setCenter(desLoc);
      return false;
    }
     i = i + 1;
  }
  alert(`"` + input + `"`+ " is not a building at Texas Tech");
  return false;
  
}

function haversine_distance(mk1, mk2) {
      var R = 3958.8; // Radius of the Earth in miles
      var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
      var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
      var difflat = rlat2-rlat1; // Radian difference (latitudes)
      var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

      var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
      return d;
    }
  
function route(){
  //test();
  let directionsService = new google.maps.DirectionsService();
  let directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map); // Existing map object displays directions
  // Create route from existing points used for markers
  const route = {
      origin: curLoc,
      destination: desLoc,
      travelMode: 'WALKING'
  }

  directionsService.route(route,
    function(response, status) { // anonymous function to capture directions
      if (status !== 'OK') {
        window.alert('Directions request failed due to ' + status);
        return;
      } else {
      
      directionsRenderer.setDirections(response); // Add route to the map
      var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
        if (!directionsData) {
          window.alert('Directions request failed');
      return;
        }
        else {
          document.getElementById('msg').innerHTML += " Walking distance is " + directionsData.distance.text + " (" + directionsData.duration.text + ").";
        }
      }
    });
}
//function that handles the errors
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaILXseINeQqMiUdutj0a6OVkPgJDV-q8&callback=initMap&libraries=places">

</script>