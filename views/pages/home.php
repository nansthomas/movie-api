<section class="hero is-home is-fullheight">
  <div class="hero-content">
    <div class="container">
      <h1 class="title">Le cinéma, comme à la maison.</h1>
      <?php if (array_key_exists('user_id', $_SESSION)): ?>
      <h2 class="subtitle"><?= 'Qu\'avez-vous envie de regarder ' . $user['first_name'] . ' ?'?></h2>
      <?php else: ?>
      <h2 class="subtitle">Parcourrez les séances de votre ville</h2>
      <?php endif ?>
      <br>
      <form class="" action="explore" method="get">
        <p class="control is-grouped">
          <input class="input is-large" type="text" name="event_name" placeholder="Film, Events..." autocomplete="off">
          <input class="input is-large middle" type="text" name="city" placeholder="Ville" autocomplete="off">
          <input class="input is-large middle" type="text" name="date" onfocus="(this.type='date')" placeholder="Date">
          <button type="submit" class="button is-pop is-large">Rechercher</button>
        </p>
      </form>
    </div>
  </div>
</section>