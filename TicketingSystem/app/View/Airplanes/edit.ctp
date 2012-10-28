<div class="airplanes form">
<?php echo $this->Form->create('Airplane'); ?>
	<fieldset>
		<legend><?php echo __('Edit Airplane'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Airplane.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Airplane.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Airplanes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Specific Flights'), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Flight'), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
