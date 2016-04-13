<section>
  <img src="<?=  $user_info->picture_url ?>" alt="" />
	<h2><?=  $user_info->first_name.' '.$user_info->last_name ?></h2>
  <h4><?=  $user_info->genre ?></h4>
  <a class="button is-info" href="<?= 'https://facebook.com/'.$user_info->facebook_id ?>">Profil Facebook</a>
  <a class="button is-warning" href="<?= 'mailto:'.$user_info->email ?>">Contacter par mail</a>
</section>

<?php

var_dump($user_info->first_name);
echo '<pre>';
print_r($user_info);
echo '</pre>';
?>
