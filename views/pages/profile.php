<section>
	<h2><?=  $_SESSION['first_name'].' '.$_SESSION['last_name'] ?></h2>
</section>

<?php 
echo '<pre>';
print_r($user_info);
echo '</pre>';
?>