<div class="reservations form">
<?php echo $form->create('Reservation');?>
	<fieldset>
 		<legend><?php __('Add Reservation');?></legend>
	<?php
		echo $form->input('seat_no');
		echo $form->input('seat_type');
		echo $form->input('fare_id');
		echo $form->input('specific_flight_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Reservations', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Fares', true), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fare', true), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific Flight', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Creditcards', true), array('controller' => 'creditcards', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Creditcard', true), array('controller' => 'creditcards', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
