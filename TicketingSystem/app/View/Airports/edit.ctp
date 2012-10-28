<div class="airports form">
<?php echo $this->Form->create('Airport'); ?>
	<fieldset>
		<legend><?php echo __('Edit Airport'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('city');
		echo $this->Form->input('country');
		echo $this->Form->input('no_of_terminals');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Airport.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Airport.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Airports'), array('action' => 'index')); ?></li>
	</ul>
</div>
