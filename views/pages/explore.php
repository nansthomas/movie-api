<script src='https://api.tiles.mapbox.com/mapbox.js/v2.2.4/mapbox.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox.js/v2.2.4/mapbox.css' rel='stylesheet' />

<div class='sidebar'>
    <!-- <div class='heading'>
      <h1>Near you</h1>
    </div> -->
    <div id='listings' class='listings'></div>
  </div>
<div id='map' class='map pad2'>Map</div>

<section class="error is-fullheight">
  <div class="hero-content">
    <div class="container">
      <h1 class="title">
        Vraiment désolé... 😢
      </h1>
      <h2 class="subtitle">
        Personne n'a créée ce que vous cherchez.
      </h2>
      <a href="<?= URL ?>"class="button is-medium">Nouvelle recherche</a><a href="<?= URL ?>create"class="button is-medium createbutton">Créer une séance</a
    </div>
  </div>
</section>


<script>

L.mapbox.accessToken = 'pk.eyJ1Ijoid2lubyIsImEiOiJjaWs2dWFxNHIwMDU5eGFtMWZ4ZWM3dDBxIn0.aixYFf9Few6MJKElA0g-0Q';

var event_name = '<?= $event_name ?>';
var city       = '<?= $city ?>';
var date       = '<?= $date ?>';

var url = '<?= URL ?>' + 'geojson' + event_name + city + date ;

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

  var data = JSON.parse(geojson);

  if (data.result === null) {
    var error = document.querySelector('.error');
    error.style.display = 'block';

  } else {
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

        // TITLE OF POPUP
        var popup = '<h3 style="background: linear-gradient(-134deg, rgba(0, 0, 0, 0.72) 0%, rgba(0, 0, 0, 0.3) 100%), url('+ prop.cover +') no-repeat center center !important; height: 70px; background-size:cover;">'+ prop.name +'</h3><div style="text-align:center;margin-bottom:7px;">' + prop.address;
        popup += '<br /><a style="margin-top:6px;"class="button is-warning" href="' + prop.link + '">Voir la séance</a>';


        var listing = listings.appendChild(document.createElement('div'));
        listing.className = 'item';

        // COVER
        var img = listing.appendChild(document.createElement('img'));
        img.href = '#';
        img.className = 'cover';
        img.src = prop.cover;

        // CREATE INFOS DIV
        var infos = listing.appendChild(document.createElement('div'));
        infos.className = 'infos';

        // CREATE TITLE
        var link = infos.appendChild(document.createElement('a'));
        link.href = '#';
        link.className = 'title';
        link.innerHTML = prop.name;

        // CREATE ADRESS
        var adress = infos.appendChild(document.createElement('p'));
        adress.className = 'adress';
        adress.innerHTML = prop.address + ' ' + prop.city + ' ' + prop.postalCode;

        // CREATE HOUR
        var hours = infos.appendChild(document.createElement('p'));
        hours.className = 'hours';
        hours.innerHTML = 'le : ' + prop.date + ' à : ' + prop.hour;

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
    }
});

</script>
