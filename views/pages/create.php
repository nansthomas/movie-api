<section class="hero is-success is-fullheight">
  <div class="hero-content">

	<div class="container">
    <h2>Création Séance</h2>
		<form action="#" method="post">
			<section>
				<h3><input type="text" name="event_name" id="event_name" value="<?= $form_data->event_name == '' ? 'Nom de l\'évènement' : $form_data->event_name ?>" ></h3>
			</section>
			<section>


				<h4>INFORMATIONS GENERALES</h4>
				<div>
					<label for="begin_date">Date</label>
					<input type="date" name="begin_date" id="begin_date" value="<?= $form_data->begin_date != '' ? $form_data->begin_date : $today ?>">
				</div>

				<div>
					<label for="begin_hour">Heure</label>
					<input type="time" name="begin_hour" id="begin_hour" value="<?= $form_data->begin_hour != '' ? $form_data->begin_hour : $time ?>">
				</div>
				<div>
					<label for="description">Description</label>
					<textarea name="description" id="description" value="<?= $form_data->description ?>"></textarea>
				</div>
				<div>
					<label for="place_nb">Nombre de places</label>
					<input type="number" name="place_nb" id="place_nb" value="<?= $form_data->place_nb ?>">
				</div>
			</section>

			<h4>LIEUX</h4>
			<section class="places">
				<div>
          <label class="label">Adresse</label>
          <p id="adress-control" class="control is-loading">
            <input class="input is-medium search-adress" type="text" name="label" id="label" placeholder="Chercher une adresse" value="<?= $form_data->adress ?>" autocomplete="off">
          </p>
				</div>
				<div class="result-list"></div>
			</section>

			<h4>AUTRES</h4>
			<section>
				<div>
					<label for="setup_display">Type d'écran</label>
					<select name="setup_display" id="setup_display" value="<?= $form_data->setup_display ?>">
						<option value="pc" <?= $form_data->setup_display == 'pc' ? 'selected' : '' ?> >Ordinateur</option>
						<option value="tv" <?= $form_data->setup_display == 'tv' ? 'selected' : '' ?> >Télévision</option>
						<option value="projecteur" <?= $form_data->setup_display == 'projecteur' ? 'selected' : '' ?> >Projecteur</option>
					</select>
				</div>
				<div>
					<label for="setup_sound">Installation son</label>
					<select name="setup_sound" id="setup_sound" value="<?= $form_data->setup_sound ?>">
						<option value="natif" <?= $form_data->setup_sound == 'natif' ? 'selected' : '' ?> >Natif</option>
						<option value="bq" <?= $form_data->setup_sound == 'bq' ? 'selected' : '' ?> >Enceinte Basse-Qualité</option>
						<option value="hq" <?= $form_data->setup_sound == 'hq' ? 'selected' : '' ?> >Enceinte Haute-Qualité</option>
					</select>
				</div>
				<div>
					<label for="supp_info">Informations complémentaires</label>
					<textarea name="supp_info" id="supp_info" value="<?= $form_data->supp_info ?>" placeholder="Je n'accepte pas les enfants - Apportez des sushis - Venez déguisés"></textarea>
				</div>
			</section>
			<section>
				<div>
          <label class="label">Nom du film</label>
          <p id="movie-control"class="control is-loading">
              <input class="input is-medium search-movie" type="text" name="movie_name" id="movie_name" placeholder="Chercher un film" value="<?= $form_data->movie_name ?>" autocomplete="off">
          </p>
				</div>
        <div class="movie-list"></div>
			</section>


			<input type="submit">

		</form>
	</div>
</div>
</section>
