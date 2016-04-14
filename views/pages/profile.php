<section>
  <img src="<?=  $user_info->picture_url ?>" alt="" />
	<h2><?=  $user_info->first_name.' '.$user_info->last_name ?></h2>
  <h4><?=  $user_info->genre ?></h4>
  <a class="button is-info" href="<?= 'https://facebook.com/'.$user_info->facebook_id ?>">Profil Facebook</a>
  <a class="button is-warning" href="<?= 'mailto:'.$user_info->email ?>">Contacter par mail</a>
</section>

<h2>Info de l'utilisateur</h2>
<?php
echo '<pre>';
print_r($user_info);
echo '</pre>';
?>

<h2>Séances organisé par l'utilisateur</h2>
<?php 
echo '<pre>';
print_r($user_event);
echo '</pre>';
?>

<h2>Séance dont l'utilisateur a participé</h2>
<?php 
echo '<pre>';
print_r($participated_event);
echo '</pre>';
?>