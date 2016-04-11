<section>
	<h2>Création Séance</h2>
	
	<div class="container">
		<form action="#" method="post">
			<h4>INFORMATIONS GENERALES</h4>
			<section>
				<div> 
					<input type="text" name="crea_name" id="crea_name" value="">
					<label for="crea_name"> Nom de l'évènement </label>
				</div>
				
				<div>
					<input type="date" name="crea_date" id="crea_date" value="">
					<label for="crea_date"> Date </label>
				</div>

				<div>
					<input type="time" name="crea_hour" id="crea_hour" value="">
					<label for="crea_hour"> Heure </label>
				</div>

				<div>
					<input type="text" name="crea_film" id="crea_film" value="">
					<label for="crea_film"> Nom du film </label>
				</div>
			</section>
				

			<h4>LIEUX</h4>
			<section class="places"> 
				<p>Choix du lieu</p>
				<div> 
					<label>
						<input type="radio" name="crea_my_place" value="lieu1" <?= $place == 'lieu1' ? 'checked' : '' ?>
						Mon lieu 1
					</label>
				</div>
						
				<div>
					<label>
						<input type="radio" name="crea_my_place" value="lieu2" <?= $place == 'lieu2' ? 'checked' : '' ?>
						Mon lieu 2
					</label>
				</div>

				<div>
					<label>
						<input type="radio" name="crea_my_place" value="nvlieu" <?= $place == 'nvlieu' ? 'checked' : '' ?>
						Nouveau lieu
					</label>
				</div>
				<br>
				<div>
					<input type="text" name="crea_adress" id="crea_adress" value="">
					<label for="crea_adress"> Voie </label>
				</div>
				<div>
					<input type="text" name="crea_city" id="crea_city" value="">
					<label for="crea_city"> Ville </label>
					<input type="text" name="crea_postal" id="crea_postal" value="">
					<label for="crea_postal"> Code Postal </label>
				</div>

				<div>
					<input type="text" name="crea_zone" id="crea_zone" value="">
					<label for="crea_zone"> Zone géographique </label>
				</div>
				<br>
				<div>
					<select name="crea_screen" id="crea_screen">
						<option value="PC">ordinateur</option>
						<option value="tv">télévision</option>
						<option value="projector">projecteur</option>
					</select>				
					<label for="crea_screen"> Type d'écran </label>
				</div>
				<br>
				<div>
					<select name="crea_definition" id="crea_definition">
						<option value="BD">Basse défintion</option>
						<option value="HD">Haute définition</option>
						<option value="4K">4K</option>
					</select>				
					<label for="crea_definition"> Défintion d'écran </label>
				</div>
				<br>
				<div>
					<input type="number" name="crea_seats" id="crea_seats" value="">
					<label for="crea_seats"> Nombre de places </label>
				</div>
			</section>
			
			<h4>AUTRES</h4>
			<section>
				<p>Faut-il apporter de quoi faire un apéritif ?</p>

				<div> 
					<label>
						<input type="radio" name="food" value="lieu1" <?= $gender == 'lieu1' ? 'checked' : '' ?>
						Non
					</label>
					<label>
						<input type="radio" name="food" value="lieu2" <?= $gender == 'lieu2' ? 'checked' : '' ?>
						Oui
					</label> 
				</div>
				<br>
				<div>
					<p>Informations complémentaires</p>
					<label for="crea_additional">
						<textarea name="crea_additional" id="crea_additional" value="" placeholder="Je n'accepte pas les enfants - Apportez des sushis - Venez déguisés"></textarea>
					</label>
				</div>
			</section>



			<br>
			<input type="submit">
			
		</form>
	</div>

</section>