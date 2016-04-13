<section>
	<h2>Dashboard</h2>
	<h3>En tant qu'hôte</h3>
	<ul>
		<li><a href="<?= URL ?>creation">Création d'une séance</a></li>
	</ul>

	<h3>Event créé</h3>
	<?php for ($i=0; $i < count($event_created); $i++): ?>
		<div class='event-preview'>
			<a href="<?= URL.'adminevent?event_id='.$event_created[$i]->event_id ?>"><?= $event_created[$i]->event_name ?></a>
			<p><?= $event_created[$i]->begin_date.' / '. $event_created[$i]->begin_hour ?></p>
			<p>Place: <?= $event_created[$i]->place_taken.' / '. $event_created[$i]->place_nb ?></p>
			<p>Demande en attente: <?= $event_created[$i]->pending_request ?></p>
		</div>
	<?php endfor ?>

	<h3>Participation à des séances</h3>
	<h4>Accepté</h4>
	<?php for ($i=0; $i < count($accepted_event); $i++): ?>
		<div class='event-preview'>
			<a href="<?= URL.'seance?event_id='.$accepted_event[$i]->event_id ?>"><?= $accepted_event[$i]->event_name ?></a>
			<p><?= $accepted_event[$i]->begin_date.' / '. $accepted_event[$i]->begin_hour ?></p>
		</div>
	<?php endfor ?>
	<h4>En attente</h4>
	<?php for ($i=0; $i < count($waiting_event); $i++): ?>
		<div class='event-preview'>
			<a href="<?= URL.'seance?event_id='.$waiting_event[$i]->event_id ?>"><?= $waiting_event[$i]->event_name ?></a>
			<p><?= $waiting_event[$i]->begin_date.' / '. $waiting_event[$i]->begin_hour ?></p>
		</div>
	<?php endfor ?>
</section>