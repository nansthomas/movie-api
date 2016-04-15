<section class="hero is-seance is-medium" style="background:linear-gradient(-134deg, rgba(0, 0, 0, 0.72) 0%, rgba(0, 0, 0, 0.72) 100%), url('https://image.tmdb.org/t/p/original<?= $movie_detail->backdrop_path ?>') no-repeat center center; background-size: cover;">
  <div class="hero-content">
    <div class="container">
      <h1 class="title"><?= $event_info[0]->event_name ?></h1>
      <h2 class="subtitle"><?= $event_info[0]->description ?></h2>
      <span><?= $event_info[0]->begin_date ?></span> | <span><?= $event_info[0]->begin_hour ?></span> | <span><?= $event_info[0]->label ?></span>
      <br>
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
    <?php if (!empty($movie_detail->budget)): ?>
      <div class="navbar-item has-text-centered">
        <p class="navbar-number">Budget</p>
        <p class="title"><?= $movie_detail->budget ?></p>
      </div>
    <?php endif ?>

    <?php if (!empty($movie_detail->vote_average)): ?>
      <div class="navbar-item has-text-centered">
        <p class="navbar-number">Moyenne</p>
        <p class="title"><?= $movie_detail->vote_average ?></p>
      </div>
    <?php endif ?>

    <?php if (!empty($movie_detail->runtime)): ?>
      <div class="navbar-item has-text-centered">
        <p class="navbar-number">Durée</p>
        <p class="title"><?= $movie_detail->runtime ?></p>
      </div>
    <?php endif ?>

    <?php if (!empty($movie_detail->vote_count)): ?>
      <div class="navbar-item has-text-centered">
        <p class="navbar-number">Nombre de vote</p>
        <p class="title"><?= $movie_detail->vote_count ?></p>
      </div>
    <?php endif ?>


  </nav>
</div>

<br>
<hr>
<br>

<div class="container hote">
  <h1 class="title is-center">A Propos de l'hôte</h1>
  <img id="profile-picture" src="<?= $event_info[0]->picture_url ?>" alt="" />
  <h2 class="subtitle"><?= $event_info[0]->first_name ?> <?= $event_info[0]->last_name ?></h2>
  <a class="button is-info facebook" href="<?= 'https://facebook.com/'.$event_info[0]->facebook_id ?>">Profil Facebook</a>
  <a class="button is-warning" href="<?= 'mailto:'.$event_info[0]->email ?>">Contacter par mail</a>
  <br>
  <br>
</div>
