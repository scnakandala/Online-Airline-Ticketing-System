<div class="fares form">
<?php echo $form->create('Fare');?>
	<fieldset>
 		<legend><?php __('Edit Fare');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('amount');
		echo $form->input('type');
		echo $form->input('weight_restrictions');
		echo $form->input('flight_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Fare.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Fare.id'))); ?></li>
		<li><?php echo $html->link(__('List Fares', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Flights', true), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Flight', true), array('controller' => 'flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
