<div class="airplanes form">
<?php echo $this->Form->create('Airplane'); ?>
	<fieldset>
		<legend><?php echo __('Add Airplane'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('max_business_class_seats');
		echo $this->Form->input('max_economy_class_seats');
		echo $this->Form->input('specific_flight_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Airplanes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Specific Flights'), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Flight'), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
