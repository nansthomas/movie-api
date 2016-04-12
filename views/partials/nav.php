<!-- <nav class="nav-bar">
	<h1><a href="<?= URL ?>">H2 SI API</a></h1>
	<?php if (!empty($_SESSION)): ?>
		<p>Connecté en tant que <?= $_SESSION['first_name'] ?></p>
	<?php endif ?>
	<ul>
		<li><a href="<?= URL ?>">Home</a></li>
		<li><a href="<?= URL ?>explore">Explore</a></li>
		<?php if (!empty($_SESSION)): ?>
			<li><a href="<?= URL ?>dashboard">Dashboard</a></li>
		<?php endif ?>
	</ul>
</nav> -->

<?php

var_dump($user);

?>

<header class="header">
  <div class="container">
    <!-- Left side -->
    <div class="header-left">
      <a class="header-item" href="<?= URL ?>">
        <h4>SuperLogo</h4>
      </a>
      <a class="header-tab is-active" href="<?= URL ?>">
        Home
      </a>
      <a class="header-tab" href="<?= URL ?>explore">
        Explore
      </a>
      <a class="header-tab" href="<?= URL ?>">
        Documentation
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
      <span class="header-item">
        <a href="#">Nav item</a>
      </span>
      <span class="header-item">
        <a href="#">Other nav item</a>
      </span>
      <span class="header-item">
        <a class="button" href="#">Button</a>
      </span>
    </div>
  </div>
</header>
