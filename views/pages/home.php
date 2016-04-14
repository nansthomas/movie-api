<section class="hero is-home is-fullheight">
  <div class="hero-content">
    <div class="container">
      <?php if (array_key_exists('user_id', $_SESSION)): ?>
      <h1 class="title"><?= 'Salut ' . $user['first_name'] . ' que veux-tu regarder ?'?></h1>
      <?php else: ?>
      <h1 class="title">Découvrez le cinéma comme à la maison.</h1>
      <?php endif ?>
      <h2 class="subtitle">Parcourrez les séances de votre ville</h2>
      <br>
      <form class="" action="explore" method="get">
        <p class="control is-grouped">
          <input class="input is-large" type="text" name="event_name" placeholder="Film, Events...">
          <input class="input is-large" type="text" name="city" placeholder="Ville">
          <input class="input input is-large" type="date" name="date">
          <input type="submit" class="button is-info is-large" value="Rechercher">
        </p>
      </form>
    </div>
  </div>
</section>
