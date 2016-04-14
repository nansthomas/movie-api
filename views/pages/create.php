<style>
	.data_error {
		border: 1px solid red;
	}
</style>

<section class="hero is-create is-fullheight">
  <div class="hero-content">
    <div class="container">
      <form action="dashboard" method="post">

        <!-- INIT -->
        <div class="start">
          <h1 class="title">Créer une séance, chez vous.</h1>
          <h2 class="subtitle">Et partager une exéprience unique.</h2>
          <a id="start" class="button is-medium is-primary is-outlined">Commencer</a>
        </div>

        <!-- NAME OF EVENT -->
        <div class="eventName">
          <h1 class="title">Choisissez un nom pour votre séance.</h1>
          <h2 class="subtitle">Plus il est sympa, plus il attirera des gens sympas 😘</h2>
          <p class="control is-grouped">
            <input class="input is-large <?= $errors->event_name === true ? 'data_error' : '' ?>" type="text" autocomplete="off" placeholder="Nom de l'évenement" name="event_name" id="event_name" value="<?= $form_data->event_name == '' ? '' : $form_data->event_name ?>" >
          </p>
          <br>
          <a id="eventName" class="button is-medium is-primary is-outlined">Suivant</a>
        </div>

        <!-- DATE / HEURES / DESCRIPTION / PLACES -->
        <div class="dateAndHours">
          <p class="control is-grouped line">
            <input class="input is-large <?= $errors->begin_date === true ? 'data_error' : '' ?>" type="date" autocomplete="off" name="begin_date" id="begin_date" value="<?= $errors->begin_date != '' ? $form_data->begin_date : $today ?>">
            <input class="input is-large <?= $errors->begin_hour === true ? 'data_error' : '' ?>" type="time" autocomplete="off" name="begin_hour" id="begin_hour" value="<?= $form_data->begin_hour != '' ? $form_data->begin_hour : $time ?>">
            <input class="input is-large <?= $errors->place_nb === true ? 'data_error' : '' ?>" type="number" autocomplete="off" palceholder="Places" name="place_nb" id="place_nb" value="<?= $form_data->place_nb ?>">
          </p>
          <p class="control is-grouped">
            <textarea class="textarea <?= $errors->description === true ? 'data_error' : '' ?>" placeholder="Selon vous, quelles sont les élèments pour que votre séance soit réussie ?" name="description" id="description" value="<?= $form_data->description ?>"></textarea>
          </p>
          <br>
          <a id="dateAndHours" class="button is-medium is-primary is-outlined">Suivant</a>
        </div>

        <!-- LIEU -->
        <div class="places">
          <h1 class="title">On se retrouve où ? 👍</h1>
          <p id="adress-control" class="control is-loading">
            <input class="input is-large search-adress <?= $errors->label === true ? 'data_error' : '' ?>" type="text" name="label" id="label" placeholder="Chercher une adresse" value="<?= $form_data->adress ?>" autocomplete="off">
          </p>
          <div class="result-list"></div>
          <br>
          <a id="places" class="button is-medium is-primary is-outlined">Suivant</a>
        </div>

        <!-- PROPERTIES -->
        <div class="properties">
          <h1 class="title">Quelques options ?</h1>
          <p class="control is-grouped line">
            <span class="select">
              <select name="setup_display" class="<?= $errors->setup_display === true ? 'data_error' : '' ?>" id="setup_display" value="<?= $form_data->setup_display ?>">
    						<option value="pc" <?= $form_data->setup_display == 'pc' ? 'selected' : '' ?> >Ordinateur</option>
    						<option value="tv" <?= $form_data->setup_display == 'tv' ? 'selected' : '' ?> >Télévision</option>
    						<option value="projecteur" <?= $form_data->setup_display == 'projecteur' ? 'selected' : '' ?> >Projecteur</option>
    					</select>
            </span>
            <br>
            <span class="select">
    					<select name="setup_sound" id="setup_sound" value="<?= $form_data->setup_sound ?>">
    						<option value="natif" <?= $form_data->setup_sound == 'natif' ? 'selected' : '' ?> >Natif</option>
    						<option value="bq" <?= $form_data->setup_sound == 'bq' ? 'selected' : '' ?> >Enceinte Basse-Qualité</option>
    						<option value="hq" <?= $form_data->setup_sound == 'hq' ? 'selected' : '' ?> >Enceinte Haute-Qualité</option>
    					</select>
            </span>
          </p>
          <br>
          <a id="properties" class="button is-medium is-primary is-outlined">Suivant</a>
        </div>

        <!-- FILM -->
        <div class="films">
          <h1 class="title">Quelle film pour la projection ? 🎥</h1>
          <p id="movie-control"class="control is-loading">
              <input class="input is-large search-movie <?= $errors->movie_name === true ? 'data_error' : '' ?>" type="text" name="movie_name" id="movie_name" placeholder="Chercher un film" value="<?= $form_data->movie_name ?>" autocomplete="off">
          </p>
          <div class="movie-list"></div>
          <br>
          <button class="button is-medium is-primary" type="submit" name="button">Créer</button>
        </div>

      </form>
  </div>
</section>
