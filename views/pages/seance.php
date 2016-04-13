<section>
	<h2>Séance</h2>
	<a id='<?= $event_info[0]->event_id ?>' class='send-attend' href='#'><?= empty($user_status) == true  ? 'Rejoindre' : 'En attente' ?></a>
	<?php echo '<pre>';
	print_r($event_info);
	echo '</pre>'; ?>
</section>
<section>
	<?php echo '<pre>';
	print_r($movie_detail);
	echo '</pre>'; ?>
</section>