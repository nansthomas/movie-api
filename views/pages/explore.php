<script src='https://api.tiles.mapbox.com/mapbox.js/v2.2.4/mapbox.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox.js/v2.2.4/mapbox.css' rel='stylesheet' />

<div class='sidebar'>
    <div class='heading'>
      <h1>Near you</h1>
    </div>
    <div id='listings' class='listings'></div>
  </div>
<div id='map' class='map pad2'>Map</div>

<script>

L.mapbox.accessToken = 'pk.eyJ1Ijoid2lubyIsImEiOiJjaWs2dWFxNHIwMDU5eGFtMWZ4ZWM3dDBxIn0.aixYFf9Few6MJKElA0g-0Q';
var url = 'http://localhost:8888/geojson';

function Get(url, cb) {
  var Httpreq = new XMLHttpRequest(); // a new request
  Httpreq.onreadystatechange = function () {
    if (Httpreq.readyState == 4 && Httpreq.status == 200) {
      cb(null, Httpreq.responseText);
    }
  };

  Httpreq.open('GET', url, false);
  Httpreq.send(null);
}

Get(url, function (error, geojson) {

  var map = L.mapbox.map('map', 'mapbox.streets');
  map.setView([48.856614, 2.352222], 13).featureLayer.setGeoJSON(JSON.parse(geojson));


  var listings = document.getElementById('listings');

  var locations = L.mapbox.featureLayer().addTo(map);
  locations.setGeoJSON(JSON.parse(geojson));

  function setActive(el) {
    var siblings = listings.getElementsByTagName('div');
    for (var i = 0; i < siblings.length; i++) {
      siblings[i].className = siblings[i].className
      .replace(/active/, '').replace(/\s\s*$/, '');
    }

    el.className += ' active';
  }

  locations.eachLayer(function (locale) {
      // Shorten locale.feature.properties to just `prop` so we're not
      // writing this long form over and over again.
      var prop = locale.feature.properties;

      var popup = '<h3>Super Séance !</h3><div>' + prop.address;

      var listing = listings.appendChild(document.createElement('div'));
      listing.className = 'item';

      var link = listing.appendChild(document.createElement('a'));
      link.href = '#';
      link.className = 'title';

      link.innerHTML = prop.name;

      if (prop.address) {
        link.innerHTML += ' <br /><small class="quiet">' + prop.address + '</small>';
        popup += '<br /><small class="quiet">' + prop.name + '</small>';
      }

      var details = listing.appendChild(document.createElement('div'));
      details.innerHTML = prop.city;

      if (prop.hour) {
        details.innerHTML += ' &middot; ' + prop.hour + 'date : ' + prop.date;
      }

      link.onclick = function () {
        setActive(listing);
        map.setView(locale.getLatLng(), 13);
        locale.openPopup();
        return false;
      };

      // Marker interaction
      locale.on('click', function (e) {
        map.panTo(this.getLatLng());
        setActive(listing);
      });

      popup += '</div>';
      locale.bindPopup(popup);

    });

});
</script>
