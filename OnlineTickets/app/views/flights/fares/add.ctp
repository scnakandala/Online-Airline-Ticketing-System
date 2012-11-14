<div class="fares form">
<?php echo $form->create('Fare');?>
	<fieldset>
 		<legend><?php __('Add Fare');?></legend>
	<?php
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
		<li><?php echo $html->link(__('List Fares', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Flights', true), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Flight', true), array('controller' => 'flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
