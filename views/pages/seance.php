<section>
	<h2>Séance: <?= $event_info[0]->event_name ?><p> à <?= $event_info[0]->city ?></p></h2>
	<div>Places prise: <?= $event_info[0]->place_taken.'/'.$event_info[0]->places_nb ?></div>
	<div><?= 'Le '.$event_info[0]->begin_date.' à '.$event_info[0]->begin_hour ?></div>
	<div><?= 'Par '.$event_info[0]->first_name ?></div>
	<div>Durée (Approximation): <?= $event_info[0]->approximate_duration ?></div>
	<div>Setup: <?= $event_info[0]->setup_display.' et '.$event_info[0]->setup_sound ?></div>
	<a id='<?= $event_info[0]->event_id ?>' class='send-attend' href='#'><?= empty($user_status) == true  ? 'Rejoindre' : 'En attente' ?></a>
	<?php if ($event_info[0]->description): ?>
		<div>
			<h5>Description</h5>
			<p><?= $event_info[0]->description ?></p>
		</div>
	<?php endif ?>
	<?php if ($event_info[0]->supp_info): ?>
		<div>
			<h5>Description</h5>
			<p><?= $event_info[0]->supp_info ?></p>
		</div>
	<?php endif ?>
</section>
<section>
	<h3><?= $movie_detail->title ?></h3>
	<p>Original Title: <?= $movie_detail->original_title ?></p>
	<div class='tags'>
		<?php for ($i=0; $i < count($movie_detail->genres); $i++): ?>
			<div class='tag'><?= $movie_detail->genres[$i]->name ?></div>
		<?php endfor ?>
	</div>
	<div>Durée: <?= $movie_detail->runtime ?></div>
	<p>Synopsys : <?= $movie_detail->overview ?></p>
</section>