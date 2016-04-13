<section>
	<h2>Création Séance</h2>
	
	<div class="container">
		<form action="#" method="post">
			<h4>INFORMATIONS GENERALES</h4>
			<section>
				<div> 
					<label for="event_name">Nom de l'évènement</label>
					<input type="text" name="event_name" id="event_name" value="<?= $event_name ?>">
				</div>
				<div>
					<label for="begin_date">Date</label>
					<input type="date" name="begin_date" id="begin_date" min="<?= $today ?>" value="<?= $begin_date != '' ? $begin_date : $today ?>">
				</div>
				
				<div>
					<label for="begin_hour">Heure</label>
					<input type="time" name="begin_hour" id="begin_hour" min="<?= $time ?>" value="<?= $begin_hour != '' ? $begin_hour : $time ?>">
				</div>
				<div>
					<label for="description">Description</label>
					<textarea name="description" id="description" value="<?= $description ?>"></textarea>
				</div>
				<div>
					<label for="movie_name">Nom du film</label>
					<input type="text" class="search-movie" name="movie_name" id="movie_name" value="<?= $movie_name ?>">
				</div>
			</section>

			<h4>LIEUX</h4>
			<section class="places"> 
				<div>
					<label for="adress">Adresse</label>
					<input type="text" name="adress" id="adress" value="<?= $adress ?>">
				</div>
				<div>
					<label for="city">Ville</label>
					<input type="text" name="city" id="city" value="<?= $city ?>">
				</div>
				<div>
					<label for="zip_code">Code Postal</label>
					<input type="text" name="zip_code" id="zip_code" value="<?= $zip_code ?>">
				</div>

				<div>
					<label for="setup_display">Type d'écran</label>
					<select name="setup_display" id="setup_display" value="<?= $setup_display ?>">
						<option value="pc" <?= $setup_display == 'pc' ? 'selected' : '' ?> >Ordinateur</option>
						<option value="tv" <?= $setup_display == 'tv' ? 'selected' : '' ?> >Télévision</option>
						<option value="projecteur" <?= $setup_display == 'projecteur' ? 'selected' : '' ?> >Projecteur</option>
					</select>				
				</div>
				<div>
					<label for="setup_sound">Installation son</label>
					<select name="setup_sound" id="setup_sound" value="<?= $setup_sound ?>">
						<option value="natif" <?= $setup_sound == 'natif' ? 'selected' : '' ?> >Natif</option>
						<option value="bq" <?= $setup_sound == 'bq' ? 'selected' : '' ?> >Enceinte Basse-Qualité</option>
						<option value="hq" <?= $setup_sound == 'hq' ? 'selected' : '' ?> >Enceinte Haute-Qualité</option>
					</select>
				</div>
				<div>
					<label for="place_nb">Nombre de places</label>
					<input type="number" name="place_nb" id="place_nb" value="<?= $place_nb ?>">
				</div>
			</section>
			
			<h4>AUTRES</h4>
			<section>
				<div>
					<label for="supp_info">Informations complémentaires</label>
					<textarea name="supp_info" id="supp_info" value="<?= $supp_info ?>" placeholder="Je n'accepte pas les enfants - Apportez des sushis - Venez déguisés"></textarea>
				</div>
			</section>

			<input type="submit">
			
		</form>
	</div>
</section>