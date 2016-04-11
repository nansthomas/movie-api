<nav class="nav-bar">
	<h1><a href="<?= URL ?>">H2 SI API</a></h1>
	<?php if (!empty($_SESSION)): ?>
		<p>CONNECTED</p>
	<?php endif ?>
	<ul>
		<li><a href="<?= URL ?>">Home</a></li>
		<li><a href="<?= URL ?>explore">Explore</a></li>
		<?php if (!empty($_SESSION)): ?>
			<li><a href="<?= URL ?>dashboard">Dashboard</a></li>
		<?php endif ?>
	</ul>
</nav>