<div class="specificFlights form">
<?php echo $form->create('SpecificFlight');?>
	<fieldset>
 		<legend><?php __('Add SpecificFlight');?></legend>
	<?php
		echo $form->input('no_of_available_business_class_seats');
		echo $form->input('no_of_available_economy_class_seats');
		echo $form->input('arrival_time');
		echo $form->input('departure_time');
		echo $form->input('flight_id');
		echo $form->input('airplane_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List SpecificFlights', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Flights', true), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Flight', true), array('controller' => 'flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Airplanes', true), array('controller' => 'airplanes', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Airplane', true), array('controller' => 'airplanes', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
