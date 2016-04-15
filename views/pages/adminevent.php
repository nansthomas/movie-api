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
  <?php foreach ($waiting_list as $profil): ?>
    <div class="card is-fullwidth waiting-user">
      <div class="card-content">
        <div class="content">
          <img id="profil-image-facebook" src="<?= $profil->picture_url ?>" alt="">
          <br>
          <div class="infos_user">
          <a href="<?= URL ?>profile?user_id=<?= $profil->user_id?>"><h1 class="title"><?= $profil->first_name ?> <?= $profil->last_name ?></h1></a>
          <span class="two-button">
            <a class="button is-success send-confirm-yes" id="<?= $profil->user_id.'-'.$event_id ?>" href="#">Accepter</a>
            <a class="button is-danger send-confirm-no" id="<?= $profil->user_id.'-'.$event_id ?>" href="#">Refuser</a>
          <span>
        </div>
      </div>
    </div>
  </div>
  <br>
  <?php endforeach; ?>

  <!-- ILS SERONT LA -->
  <?php if (!empty($comfirmed_list)): ?>
      <h1 class="title">Ils seront là ! 🍻</h1>
  <?php endif; ?>
  <?php foreach ($comfirmed_list as $profil): ?>
    <div class="card is-fullwidth waiting-user">
      <div class="card-content">
        <div class="content">
          <img id="profil-image-facebook" src="<?= $profil->picture_url ?>" alt="">
          <br>
          <div class="infos_user">
          <a href="<?= URL ?>profile?user_id=<?= $profil->user_id?>"><h1 class="title"><?= $profil->first_name ?> <?= $profil->last_name ?></h1></a>
          <span class="two-button">
            <a class="button is-success" id="<?= $profil->user_id.'-'.$event_id ?>" class="send-confirm-yes" href="#">Accepter</a>
            <a class="button is-danger" id="<?= $profil->user_id.'-'.$event_id ?>" class="send-confirm-no" href="#">Refuser</a>
          <span>
        </div>
      </div>
    </div>
  </div>
  <br>
  <?php endforeach; ?>
