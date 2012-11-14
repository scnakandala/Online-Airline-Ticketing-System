<div class="creditcards form">
<?php echo $form->create('Creditcard');?>
	<fieldset>
 		<legend><?php __('Add Creditcard');?></legend>
	<?php
		echo $form->input('credit_card_no');
		echo $form->input('credit_card_type');
		echo $form->input('expiration_date');
		echo $form->input('reservation_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Creditcards', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
