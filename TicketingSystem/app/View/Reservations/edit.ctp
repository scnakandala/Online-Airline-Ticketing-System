<div class="reservations form">
<?php echo $this->Form->create('Reservation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Reservation'); ?></legend>
	<?php
		echo $this->Form->input('seat_no');
		echo $this->Form->input('seat_type');
		echo $this->Form->input('id');
		echo $this->Form->input('fare_id');
		echo $this->Form->input('specific_flight_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Reservation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Reservation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reservations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Specific Flights'), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Flight'), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Creditcards'), array('controller' => 'creditcards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creditcard'), array('controller' => 'creditcards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
