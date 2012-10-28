<div class="flights form">
<?php echo $this->Form->create('Flight'); ?>
	<fieldset>
		<legend><?php echo __('Edit Flight'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('airline');
		echo $this->Form->input('fly_monday');
		echo $this->Form->input('fly_tuesday');
		echo $this->Form->input('fly_wednesday');
		echo $this->Form->input('fly_thursday');
		echo $this->Form->input('fly_friday');
		echo $this->Form->input('fly_saturday');
		echo $this->Form->input('fly_sunday');
		echo $this->Form->input('scheduled_arrival_time');
		echo $this->Form->input('scheduled_departure_time');
		echo $this->Form->input('arrival_airport');
		echo $this->Form->input('departure_airport');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Flight.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Flight.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Flights'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Fares'), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fare'), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specificflights'), array('controller' => 'specificflights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specificflight'), array('controller' => 'specificflights', 'action' => 'add')); ?> </li>
	</ul>
</div>
