<header class="header <?= $menuStyle ?>">
  <div class="container">
    <!-- Left side -->
    <div class="header-left">
      <a class="header-item" href="<?= URL ?>">
        <img id="logo" src="src/img/pophome_<?= $logoStyle ?>.svg" alt="" />
      </a>
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

      <span class="header-item dropdown">
        <img src="<?= $user['picture']['url'] ?>" alt="" />
        <a class="header-name" href="#"><p><strong><?= 'Bonjour ' . $user['first_name'] . ' !' ?></strong></p></a>
      </span>
      <span class="header-item">
        <a class="header-item" href="<?= URL ?>explore">Explore</a>
      </span>
      <span class="header-item">
        <a class="header-item" href="<?= URL.'profile?user_id='.$_SESSION['user_id'] ?>">Profil</a>
      </span>
      <span class="header-item">
        <a class="header-item" href="<?= URL ?>dashboard">Dashboard</a>
      </span>
      <span class="header-item">
        <a class="header-item" href="<?= URL ?>logout">Logout</a>
      </span>
      <?php endif ?>

      <!-- USER NOT CONNECTED -->
      <?php if (!array_key_exists('user_id', $_SESSION)): ?>
        <span class="header-item">
          <a class="header-item" href="<?= URL ?>explore">Explore</a>
        </span>
        <span class="header-item">
          <a class="header-item" href="#">How it works</a>
        </span>
        <span class="header-item">
          <a class="button is-info facebook" href="<?= $user  ?>"><i class="fa fa-facebook-square fa-fw"></i> Connect with facebook</a></span>
        </span>
      <?php endif ?>

    </div>
  </div>
</header>
