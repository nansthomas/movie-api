<section>
	<h2>Séance</h2>
	<a id='<?= $event_info[0]->event_id ?>' class='send-attend' href='#'><?= empty($user_status) == true  ? 'Rejoindre' : 'En attente' ?></a>
	<?php echo '<pre>';
	print_r($event_info);
	echo '</pre>'; ?>
</section>
<section>
	<h3>Attend List</h3>
	<?php echo '<pre>';
	print_r($attend_list);
	echo '</pre>'; ?>
</section>
<section>
	<h3>Movie Detail</h3>
	<?php echo '<pre>';
	print_r($movie_detail);
	echo '</pre>'; ?>
</section>

<section class="hero is-seance is-medium">
  <div class="hero-content">
  </div>
</section>

<div class="container">
  <img src="<?= $event_info[0]->picture_url ?>" alt="" />
  <div class="notification">
    This container is <strong>centered</strong> on desktop.
  </div>
</div>
