<div class="creditcards form">
<?php echo $this->Form->create('Creditcard'); ?>
	<fieldset>
		<legend><?php echo __('Edit Creditcard'); ?></legend>
	<?php
		echo $this->Form->input('credit_card_no');
		echo $this->Form->input('credit_card_type');
		echo $this->Form->input('expiration_date');
		echo $this->Form->input('id');
		echo $this->Form->input('reservation_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Creditcard.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Creditcard.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Creditcards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reservations'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation'), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
