<section class="hero is-seance is-medium" style="background:linear-gradient(-134deg, rgba(0, 0, 0, 0.72) 0%, rgba(0, 0, 0, 0.72) 100%), url('<?= $user_info->picture_url ?>') no-repeat center center; background-size: cover;">
  <div class="hero-content">
    <div class="container">
      <h1 class="title"><?= $user_info->first_name.' '.$user_info->last_name ?></h1>
      <?php if ($user_info->genre == 'male'): ?>
      <h2 class="subtitle">👨 Homme</h2>
      <?php else: ?>
      <h2 class="subtitle">👩 Femme<</h2>
      <?php endif ?>
      <a class="button is-info" href="<?= 'https://facebook.com/'.$user_info->facebook_id ?>">Profil Facebook</a>
      <a class="button is-warning" href="<?= 'mailto:'.$user_info->email ?>">Contacter par mail</a>
    </div>
  </div>
</section>

<br>
<br>
<div class="container">
  <h1 class="title">Les séances de cette utilisateur</h1>
  <?php foreach ($user_event as $event): ?>
    <div class="card is-fullwidth">
      <header class="card-header">
        <p class="card-header-title"><?= $event->event_name ?></p>
      </header>
      <div class="card-content">
        <div class="content">
          <?= $event->description ?>
          <br>
          <small>Il reste actuellement <?= ($event->place_nb - $event->place_taken) ?> places</small><br>
          <small><?= $event->begin_hour ?> - <?= $event->begin_date ?></small><br>
          <small><?= $event->label ?></small>
        </div>
      </div>
      <footer class="card-footer">
        <a href="<?= URL ?>seance?event_id=<?= $event->event_id ?>"class="card-footer-item">Voir la séance</a>
      </footer>
    </div>
    <br>
  <?php endforeach; ?>
<br>
</div>
