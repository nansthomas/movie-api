<section>
	<h2>Dashboard</h2>
	<h3>En tant qu'hôte</h3>
	<ul>
		<li><a href="<?= URL ?>creation">Création d'une séance</a></li>
	</ul>

	<h3>Event créé</h3>
	<?php for ($i=0; $i < count($event_created); $i++): ?>
		<div class='event-preview'>
			<a href="<?= URL.'adminevent/'.$event_created[$i]->event_id ?>"><?= $event_created[$i]->event_name ?></a>
			<p><?= $event_created[$i]->begin_date.' / '. $event_created[$i]->begin_hour ?></p>
			<p>Place: <?= $event_created[$i]->place_taken.' / '. $event_created[$i]->place_nb ?></p>
			<p>Demande en attente: <?= $event_created[$i]->pending_request ?></p>
		</div>
	<?php endfor ?>
</section>