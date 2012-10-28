<div class="airports form">
<?php echo $this->Form->create('Airport'); ?>
	<fieldset>
		<legend><?php echo __('Add Airport'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Airports'), array('action' => 'index')); ?></li>
	</ul>
</div>
