<div class="specificflights form">
<?php echo $this->Form->create('Specificflight'); ?>
	<fieldset>
		<legend><?php echo __('Edit Specificflight'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('no_of_available_business_class_seats');
		echo $this->Form->input('no_of_available_economy_class_seats');
		echo $this->Form->input('id');
		echo $this->Form->input('arrival_time');
		echo $this->Form->input('departure_time');
		echo $this->Form->input('flight_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Specificflight.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Specificflight.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Specificflights'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Flights'), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flight'), array('controller' => 'flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
