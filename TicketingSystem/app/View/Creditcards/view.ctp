<div class="creditcards view">
<h2><?php  echo __('Creditcard'); ?></h2>
	<dl>
		<dt><?php echo __('Credit Card No'); ?></dt>
		<dd>
			<?php echo h($creditcard['Creditcard']['credit_card_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit Card Type'); ?></dt>
		<dd>
			<?php echo h($creditcard['Creditcard']['credit_card_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiration Date'); ?></dt>
		<dd>
			<?php echo h($creditcard['Creditcard']['expiration_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($creditcard['Creditcard']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($creditcard['Creditcard']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($creditcard['Creditcard']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reservation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($creditcard['Reservation']['id'], array('controller' => 'reservations', 'action' => 'view', $creditcard['Reservation']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Creditcard'), array('action' => 'edit', $creditcard['Creditcard']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Creditcard'), array('action' => 'delete', $creditcard['Creditcard']['id']), null, __('Are you sure you want to delete # %s?', $creditcard['Creditcard']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Creditcards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creditcard'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservations'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation'), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
