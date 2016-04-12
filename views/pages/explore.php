<section>
	<h2>Explore</h2>
	<?php for ($i=0; $i < count($events_list); $i++): ?>
			<div class='event-preview'>
				<div><?= $events_list[$i]->event_name ?></div>
				<div><?= 'Le '.$events_list[$i]->begin_date.' - '.$events_list[$i]->begin_hour.' à '.$events_list[$i]->city.' par '.$events_list[$i]->first_name ?></div>
				<div>Durée (Estimation): <?= $events_list[$i]->approximate_duration ?></div>
			</div>
	<?php endfor ?>
</section>