<script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' />

<section class="hero is-seance is-medium" style="background:linear-gradient(-134deg, rgba(0, 0, 0, 0.72) 0%, rgba(0, 0, 0, 0.72) 100%), url('https://image.tmdb.org/t/p/original<?= $movie_detail->backdrop_path ?>') no-repeat center center; background-size: cover;">
  <div class="hero-content">
    <div class="container">
      <h1 class="title"><?= $event_info[0]->event_name ?></h1>
      <h2 class="subtitle"><?= $event_info[0]->description ?></h2>
      <span><?= $event_info[0]->begin_date ?></span>| <span><?= $event_info[0]->begin_hour ?></span> | <span><?= $event_info[0]->label ?></span>
      <br>
      <?php if ($user_id == NULL): ?>
        <a id='<?= $event_info[0]->event_id ?>' class='button is-medium is-success' href='<?= URL ?>login'><span class="icon"><i class="fa fa-check"></i></span><span>Participer</span></a>
      <?php else: ?>
        <a id='<?= $event_info[0]->event_id ?>' class='send-attend button is-medium is-success' href='#'><span class="icon"><i class="fa fa-check"></i></span><span><?= empty($user_status) == true  ? 'Participer' : 'En attente' ?></span></a>
      <?php endif ?>
      
    </div>
  </div>
</section>

<div class="container">
  <div class="general_infos">
    <img src="https://image.tmdb.org/t/p/original<?= $movie_detail->poster_path ?>" alt="" />
    <div class="text_infos">
      <h1 class="title"><?= $movie_detail->title ?></h1><span><?= date('Y', strtotime($movie_detail->release_date)); ?></span>
      <h2 class="subtitle"><?= $movie_detail->tagline ?></h2>
      <p><?= $movie_detail->overview ?></p>
    </div>
  </div>

  <nav class="navbar number">
    <div class="navbar-item has-text-centered">
      <p class="navbar-number">Budget</p>
      <p class="title"><?= $movie_detail->budget ?></p>
    </div>
    <div class="navbar-item has-text-centered">
      <p class="navbar-number">Moyenne</p>
      <p class="title"><?= $movie_detail->vote_average ?></p>
    </div>
    <div class="navbar-item has-text-centered">
      <p class="navbar-number">Durée</p>
      <p class="title"><?= $movie_detail->runtime ?></p>
    </div>
    <div class="navbar-item has-text-centered">
      <p class="navbar-number">Nombre de vote</p>
      <p class="title"><?= $movie_detail->vote_count ?></p>
    </div>
  </nav>
</div>

<br>
<hr>
<br>

<div class="container hote">
  <h1 class="title is-center">A Propos de l'hôte</h1>
  <img id="profile-picture" src="<?= $event_info[0]->picture_url ?>" alt="" />
  <h2 class="subtitle"><?= $event_info[0]->first_name ?> <?= $event_info[0]->last_name ?></h2>
  <a class="button is-info" href="<?= 'https://facebook.com/'.$user_info[0]->facebook_id ?>">Profil Facebook</a>
  <a class="button is-warning" href="<?= 'mailto:'.$user_info[0]->email ?>">Contacter par mail</a>
  <br>
  <br>
</div>

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
