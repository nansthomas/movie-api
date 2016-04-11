<section>
	<h2>Création Séance</h2>
	
	<div class="container">
		<form action="#" method="post">
			<h4>INFORMATIONS GENERALES</h4>
			<section>
				<div> 
					<label for="crea_name">Nom de l'évènement</label>
					<input type="text" name="crea_name" id="crea_name" value="">
				</div>
				<div>
					<label for="crea_date">Date</label>
					<input type="date" name="crea_date" id="crea_date" value="">
				</div>
				<div>
					<label for="crea_hour">Heure</label>
					<input type="time" name="crea_hour" id="crea_hour" value="">
				</div>
				<div>
					<label for="crea_film"> Nom du film </label>
					<input type="text" name="crea_film" id="crea_film" value="">
				</div>
			</section>

			<h4>LIEUX</h4>
			<section class="places"> 
				<div>
					<label for="crea_adress">Voie</label>
					<input type="text" name="crea_adress" id="crea_adress" value="">
				</div>
				<div>
					<label for="crea_city">Ville</label>
					<input type="text" name="crea_city" id="crea_city" value="">
				</div>
				<div>
					<label for="crea_postal">Code Postal</label>
					<input type="text" name="crea_postal" id="crea_postal" value="">
				</div>

				<div>
					<label for="crea_zone">Zone géographique</label>
					<input type="text" name="crea_zone" id="crea_zone" value="">
				</div>
				<br>
				<div>
					<label for="crea_screen">Type d'écran</label>
					<select name="crea_screen" id="crea_screen">
						<option value="PC">Ordinateur</option>
						<option value="tv">Télévision</option>
						<option value="projector">Projecteur</option>
					</select>				
				</div>
				<div>
					<label for="crea_definition"> Défintion d'écran </label>
					<select name="crea_definition" id="crea_definition">
						<option value="BD">Basse défintion</option>
						<option value="HD">Haute définition</option>
						<option value="4K">4K</option>
					</select>
				</div>
				<div>
					<label for="crea_seats"> Nombre de places </label>
					<input type="number" name="crea_seats" id="crea_seats" value="">
				</div>
			</section>
			
			<h4>AUTRES</h4>
			<section>
				<p>Faut-il apporter de quoi faire un apéritif ?</p>
				<div> 
					<label><input type="radio" name="food" value="lieu1">Oui</label>
					<label><input type="radio" name="food" value="lieu2">Non</label> 
				</div>
				<div>
					<p>Informations complémentaires</p>
					<label for="crea_additional">
						<textarea name="crea_additional" id="crea_additional" value="" placeholder="Je n'accepte pas les enfants - Apportez des sushis - Venez déguisés"></textarea>
					</label>
				</div>
			</section>

			<input type="submit">
			
		</form>
	</div>

</section>