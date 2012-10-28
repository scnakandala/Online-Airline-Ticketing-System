<div class="fares form">
<?php echo $this->Form->create('Fare'); ?>
	<fieldset>
		<legend><?php echo __('Add Fare'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Fares'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Flights'), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flight'), array('controller' => 'flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
