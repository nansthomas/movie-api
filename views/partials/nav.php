<header class="header">
  <div class="container">
    <!-- Left side -->
    <div class="header-left">
      <a class="header-item" href="<?= URL ?>">
        <h4>SuperLogo</h4>
      </a>
      <a class="header-tab is-active" href="<?= URL ?>">Home</a>
      <a class="header-tab" href="<?= URL ?>explore">Explore</a>
    </div>

    <!-- Hamburger menu (on mobile) -->
    <span class="header-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>

    <!-- Right side -->
    <div class="header-right header-menu">

      <!-- USER CONNECTED -->
      <?php if (array_key_exists('user_id', $_SESSION)): ?>
      <span class="header-item">
        <img src="<?= $user['picture']['url'] ?>" alt="" />
        <a href="#"><p><strong><?= $user['first_name'] ?></strong></p></a>
      </span>
      <span class="header-item">
        <a href="<?= URL.'profile?user_id='.$_SESSION['user_id'] ?>">Profil</a>
      </span>
      <span class="header-item">
        <a href="<?= URL ?>dashboard">Dashboard</a>
      </span>
      <?php endif ?>

      <!-- USER NOT CONNECTED -->
      <?php if (!array_key_exists('user_id', $_SESSION)): ?>
        <span class="header-item">
          <a class="button" href="<?= $user  ?>">Login with Facebook!</a>
        </span>

      <!-- USER DECONNEXION -->
      <?php else: ?>
        <span class="header-item">
          <a class="button" href="<?= URL ?>logout">Deconexion</a>
        </span>
      <?php endif ?>

    </div>
  </div>
</header>
