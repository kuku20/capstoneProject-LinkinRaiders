
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
  * {
    margin: 0;
    padding: 0;
  }
  #map{
    height: 500px;
    width: 90%;
    margin-left: 120px;
  }
  #name1{
    margin-left: 120px;
  }
  </style>
</head>
<body>
<form id = "name1" onsubmit="return search()";>
    <label for "location">Location:</label><br>
    <input type="text" id="location" name="location"><br>
</form>
  <div id="map"></div>
  <table id = "name1">
        <tr>
            <th>Name</th>
            <td id="name">Texas Tech</td>
          </tr>
          <tr>
            <th>Address</th>
            <td id="address">Texas Tech Drive</td>
          </tr>
          <tr>
            <th>Info</th>
            <td id = "info">Default info about tech</td>
          </tr>
  </table>
<button id = "name1" type="button" onclick="return route()">Route</button>
<div id="msg"></div>

<script>
//constant declarations
const lubCenter = {lat:33.58438431248001, lng:-101.87831451579754}

const murdoughHall = {lat: 33.58401852803292, lng: -101.88098932860129, name: "Murdough Hall",address: "address 1", info: "info here 1"}
const experimentalSciences = {lat:33.58547469574215, lng: -101.87896067815234, name: "Experemental",address: "address 2", info: "info here 2"}

const markerArr = [murdoughHall, experimentalSciences];


// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;
var curLoc;
var desLoc;

function haversine_distance(mk1, mk2) {
      var R = 3958.8; // Radius of the Earth in miles
      var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
      var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
      var difflat = rlat2-rlat1; // Radian difference (latitudes)
      var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

      var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
      return d;
    }
  

function initMap() {
  var updateBool = 0;
  map = new google.maps.Map(document.getElementById("map"), {
    center: lubCenter,
    zoom: 17,
  });
  infoWindow = new google.maps.InfoWindow();
  geoLocator(map, infoWindow);
}

function addMarker(location, map, label){
new google.maps.Marker({
      position: location,
      label: { color: '#00aaff', fontWeight: 'bold', fontSize: '14px', text: label },
      map: map,});
}

function Markers(map, markerArr){
  
  var i = 0;
  while(i <= markerArr.length){
    new google.maps.Marker({
      position: {lat:markerArr[i].lat, lng:markerArr[i].lng},
      label: { color: '#00aaff', fontWeight: 'bold', fontSize: '14px', text: markerArr[i].name },
      map: map,});
    i = i + 1;
  }
  
}

function updateMapMarkers(node){
  var location = new google.maps.LatLng(node[i].lat, node[i].lng);
    var marker = new google.maps.Marker({
      position: location,
      label: { color: '#00aaff', fontWeight: 'bold', fontSize: '14px', text: node[i].name },
      title: node[i].name});
    marker.setMap(map);
    map.setCenter({lat: node.lat, lng: node.lng});
}

function geoLocator(map, infoWindow){
  const locationButton = document.createElement("button");

  locationButton.textContent = "Find Current Location";
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
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function test(){
  
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
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
}
function search(){
  var i = 0
  var input = document.getElementById("location").value;
  var len = markerArr.length - 1;
  while(i <= len){
    if(input == markerArr[i].name){
      document.getElementById("name").innerHTML = markerArr[i].name;
      document.getElementById("address").innerHTML = markerArr[i].address;
      document.getElementById("info").innerHTML = markerArr[i].info;
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

function route(){
  test();
  let directionsService = new google.maps.DirectionsService();
  let directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map); // Existing map object displays directions
  // Create route from existing points used for markers
  const route = {
      origin: curLoc,
      destination: desLoc,
      travelMode: 'DRIVING'
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
          document.getElementById('msg').innerHTML += " Driving distance is " + directionsData.distance.text + " (" + directionsData.duration.text + ").";
        }
      }
    });
}
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
</body>
</html>