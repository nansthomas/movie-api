<section>
<h4>Waiting List</h4>
<ul>
	<?php for ($i=0; $i < count($waiting_list); $i++): ?>
		<li>
			<p><?= $waiting_list[$i]->first_name.' '.$waiting_list[$i]->last_name ?></p>
			<div class="admin-yn">
				<a id="<?= $waiting_list[$i]->user_id.'-'.$event_id ?>" class="send-confirm-yes" href="#">Accepter</a> | 
				<a id="<?= $waiting_list[$i]->user_id.'-'.$event_id ?>" class="send-confirm-no" href="#">Refuser</a>
			</div>
		</li>
	<?php endfor ?>
</ul>
</section>
<section>
<h4>Comfirmed List</h4>
<?php 
echo '<pre>';
print_r($comfirmed_list);
echo '</pre>';
?>
</section>