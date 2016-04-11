<section>
	<h2>Création Séance</h2>
	
	<div class="container">
		<form action="#" method="post">
			<h4>INFORMATIONS GENERALES</h4>
			<section>
				<div> 
					<label for="event_name">Nom de l'évènement</label>
					<input type="text" name="event_name" id="event_name" value="">
				</div>
				<div>
					<label for="begin_date">Date</label> <!-- Need to be in this format : AAAA-MM-JJ  -->
					<input type="date" name="begin_date" id="begin_date" value="">
				</div>
				<div>
					<label for="begin_hour">Heure</label>
					<input type="time" name="begin_hour" id="begin_hour" value="">
				</div>
				<div>
					<label for="crea_additional">Description</label>
					<textarea name="crea_additional" id="crea_additional" value=""></textarea>
				</div>
				<div>
					<label for="movie_name">Nom du film</label>
					<input type="text" name="movie_name" id="movie_name" value="">
				</div>
			</section>

			<h4>LIEUX</h4>
			<section class="places"> 
				<div>
					<label for="adress">Adresse</label>
					<input type="text" name="adress" id="adress" value="">
				</div>
				<div>
					<label for="city">Ville</label>
					<input type="text" name="city" id="city" value="">
				</div>
				<div>
					<label for="zip_code">Code Postal</label>
					<input type="text" name="zip_code" id="zip_code" value="">
				</div>

				<div>
					<label for="setup_display">Type d'écran</label>
					<select name="setup_display" id="setup_display">
						<option value="PC">Ordinateur</option>
						<option value="tv">Télévision</option>
						<option value="projector">Projecteur</option>
					</select>				
				</div>
				<div>
					<label for="setup_sound">Installation son</label>
					<select name="crea_definition" id="crea_definition">
						<option value="natif">Natif</option>
						<option value="bq">Enceinte Basse-Qualité</option>
						<option value="hq">Enceinte Haute-Qualité</option>
					</select>
				</div>
				<div>
					<label for="places_nb">Nombre de places</label>
					<input type="number" name="places_nb" id="places_nb" value="">
				</div>
			</section>
			
			<h4>AUTRES</h4>
			<section>
				<div>
					<label for="supp_info">Informations complémentaires</label>
					<textarea name="supp_info" id="supp_info" value="" placeholder="Je n'accepte pas les enfants - Apportez des sushis - Venez déguisés"></textarea>
				</div>
			</section>

			<input type="submit">
			
		</form>
	</div>

</section>