<div class="fares form">
<?php echo $this->Form->create('Fare'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fare'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('amount');
		echo $this->Form->input('type');
		echo $this->Form->input('weight_restrictions');
		echo $this->Form->input('flight_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Fare.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Fare.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fares'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Flights'), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flight'), array('controller' => 'flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
