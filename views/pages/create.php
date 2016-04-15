<section class="hero is-create is-fullheight">
  <div class="hero-content">
    <div class="container">
      <form action="send-event" method="POST">

        <!-- INIT -->
        <div class="start">
          <h1 class="title">Créer une séance, chez vous.</h1>
          <h2 class="subtitle">Et partager une expérience unique.</h2>
          <a id="start" class="button is-medium is-dashboard is-outlined">Commencer</a>
        </div>

        <!-- NAME OF EVENT -->
        <div class="eventName">
          <h1 class="title">Choisissez un nom pour votre séance.</h1>
          <h2 class="subtitle">Plus il est sympa, plus il attirera des gens sympas 😘</h2>
          <p class="control is-grouped">
            <input class="input is-large" type="text" autocomplete="off" placeholder="Nom de l'évenement" name="event_name" id="event_name">
          </p>
          <br>
          <a id="eventName" class="button is-medium is-dashboard is-outlined">Suivant</a>
        </div>

        <!-- DATE / HEURES / DESCRIPTION / PLACES -->
        <div class="dateAndHours">
          <p class="control is-grouped line">
            <input class="input is-large" type="date" autocomplete="off" name="begin_date" id="begin_date" value="$today ?>">
            <input class="input is-large" type="time" autocomplete="off" name="begin_hour" id="begin_hour" value="<?= $time ?>">
            <input class="input is-large" type="number" autocomplete="off" placeholder="Places" min="1" name="place_nb" id="place_nb">
          </p>
          <p class="control is-grouped">
            <textarea class="textarea" placeholder="Selon vous, quelles sont les élèments pour que votre séance soit réussie ?" name="description" id="description"></textarea>
          </p>
          <br>
          <a id="dateAndHours" class="button is-medium is-dashboard is-outlined">Suivant</a>
        </div>

        <!-- LIEU -->
        <div class="places">
          <h1 class="title">On se retrouve où ? 👍</h1>
          <p id="adress-control" class="control is-loading">
            <input class="input is-large search-adress" type="text" name="label" id="label" placeholder="Chercher une adresse" autocomplete="off">
          </p>
          <div class="result-list"></div>
          <br>
          <a id="places" class="button is-medium is-dashboard is-outlined">Suivant</a>
        </div>

        <!-- FILM -->
        <div class="films">
          <h1 class="title">Quelle film pour la projection ? 🎥</h1>
          <p id="movie-control"class="control is-loading">
              <input class="input is-large search-movie" type="text" name="movie_name" id="movie_name" placeholder="Chercher un film" autocomplete="off">
          </p>
          <div class="movie-list"></div>
          <br>
          <button class="button is-medium is-dashboard" type="submit" name="button">Créer</button>
        </div>

      </form>
  </div>
  
  <script>

  var startButton         = document.querySelector('#start');
  var start               = document.querySelector('.start');
  var eventName           = document.querySelector('.eventName');
  var eventNameButton     = document.querySelector('#eventName');
  var dateAndHours        = document.querySelector('.dateAndHours');
  var dateAndHoursButton  = document.querySelector('#dateAndHours');
  var places              = document.querySelector('.places');
  var placeButton         = document.querySelector('#places');
  var properties         = document.querySelector('.properties');
  var propertiesButton         = document.querySelector('#properties');
  var films         = document.querySelector('.films');
  var filmsButton         = document.querySelector('#films');

  startButton.addEventListener('click', function () {
    start.style.display = 'none';
    eventName.style.display = 'block';
  });

  eventNameButton.addEventListener('click', function () {
    eventName.style.display = 'none';
    dateAndHours.style.display = 'block';
  });

  dateAndHoursButton.addEventListener('click', function () {
    dateAndHours.style.display = 'none';
    places.style.display = 'block';
  });

  placeButton.addEventListener('click', function () {
    places.style.display = 'none';
    films.style.display = 'block';
  });

  </script>
</section>
