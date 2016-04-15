<section class="hero is-create is-medium" style="background:linear-gradient(-134deg, rgba(0, 0, 0, 0.72) 0%, rgba(0, 0, 0, 0.72) 100%), url('https://image.tmdb.org/t/p/original<?= $event_movie_info[0]->backdrop_path ?>') no-repeat center center; background-size: cover;">
  <div class="hero-content">
    <div class="container">
      <h1 class="title">Gestion de <?= $event_movie_info[0]->movie_name ?></h1>
      <h2 class="subtitle">Administrer votre évènement simplement.</h2>
    </div>
  </div>
</section>
<br>
<br>
<div class="container">
  <!-- EN ATTENTE-->
  <?php if (!empty($waiting_list)): ?>
      <h1 class="title">Ils attentent votre réponse 😎</h1>
  <?php endif; ?>
  <?php foreach ($waiting_list as $event): ?>
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

<section>
<h4>Waiting List</h4>
<ul>
	<?php for ($i=0; $i < count($waiting_list); $i++): ?>
		<li>
			<p><?= $waiting_list[$i]->first_name.' '.$waiting_list[$i]->last_name ?></p>
			<div class="admin-yn">
				<a id="<?= $waiting_list[$i]->user_id.'-'.$event_id ?>" class="send-confirm-yes" href="#">Accepter</a> |
				<a id="<?= $waiting_list[$i]->user_id.'-'.$event_id ?>" class="send-confirm-no" href="#">Refuser</a>
			</div>
		</li>
	<?php endfor ?>
</ul>
</section>
<section>
<h4>Comfirmed List</h4>
<?php
echo '<pre>';
print_r($comfirmed_list);
echo '</pre>';
?>
</section>
