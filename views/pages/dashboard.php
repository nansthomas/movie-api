<section class="hero is-create is-medium">
  <div class="hero-content">
    <div class="container">
      <h1 class="title">Dashboard</h1>
      <a class="button is-dashboard is-outlined"><i class="fa fa-plus-square-o fa-fw" aria-hidden="true"></i> Créer une séance</a>
    </div>
  </div>
</section>

<br>
<br>
<div class="container">
  <!-- YOUR EVENT -->
  <?php if (!empty($event_created)): ?>
      <h1 class="title">Vos évènements</h1>
  <?php endif; ?>
  <?php foreach ($event_created as $event): ?>
    <div class="card is-fullwidth">
      <header class="card-header">
        <p class="card-header-title"><?= $event->event_name ?></p>
      </header>
      <div class="card-content">
        <div class="content">
          <?= $event->description ?>
          <br>
          <small><?= $event->place_taken ?> sur <?= $event->place_nb ?> sont déjà réservé ! 👍</small><br>
          <small><?= $event->begin_hour ?> - <?= $event->begin_date ?></small><br>
          <small><?= $event->label ?></small>
        </div>
      </div>
      <footer class="card-footer">
        <a href="<?= URL ?>adminevent?event_id=<?= $event->event_id ?>"class="card-footer-item"><?= $event->pending_request ?> demandes en attente</a>
        <a href="<?= URL ?>adminevent?event_id=<?= $event->event_id ?>"class="card-footer-item">Gérer l'évènement</a>
      </footer>
    </div>
    <br>
  <?php endforeach; ?>

  <!-- DEJA ACCEPTED -->
  <br>
  <?php if (!empty($accepted_event) || !empty($pending_event)): ?>
    <h1 class="title">Vos participations</h1>
  <?php endif; ?>
  <?php if (!empty($accepted_event)): ?>
      <h2 class="subtitle">Déjà accpeté 😍</h2>
  <?php endif; ?>
  <?php foreach ($accepted_event as $event): ?>
    <div class="card is-fullwidth">
      <header class="card-header">
        <p class="card-header-title"><?= $event->event_name ?></p>
      </header>
      <div class="card-content">
        <div class="content">
          <?= $event->description ?>
          <br>
          <small>Chez  <img id="facebook-dashboard" src="<?= $event->picture_url ?>"><small id="name"><?= $event->first_name.' '.$event->last_name ?></small></small><br>
          <small>Vous êtes <?= ($event->place_taken + 1) ?> pour le moment ! 👍</small><br>
          <small><?= $event->begin_hour ?> - <?= $event->begin_date ?></small><br>
          <small><?= $event->label ?></small>
        </div>
      </div>
    </div>
    <br>
    <?php endforeach; ?>
  <br>

  <!-- EN ATTENTE -->
  <?php if (!empty($pending_event)): ?>
    <h2 class="subtitle">En attente 😱</h2>
  <?php endif; ?>
  <?php foreach ($pending_event as $event): ?>
    <div class="card is-fullwidth">
      <header class="card-header">
        <p class="card-header-title"><?= $event->event_name ?></p>
      </header>
      <div class="card-content">
        <div class="content">
          <?= $event->description ?>
          <br>
          <small>Chez  <img id="facebook-dashboard" src="<?= $event->picture_url ?>"><small id="name"><?= $event->first_name.' '.$event->last_name ?></small></small><br>
          <small><?= $event->begin_hour ?> - <?= $event->begin_date ?></small><br>
          <small><?= $event->label ?></small>
        </div>
      </div>
    </div>
    <br>
  <?php endforeach; ?>
</div>
<br>
</div>
