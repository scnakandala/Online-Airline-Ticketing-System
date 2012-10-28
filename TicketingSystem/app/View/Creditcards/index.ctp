<div class="creditcards index">
	<h2><?php echo __('Creditcards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('credit_card_no'); ?></th>
			<th><?php echo $this->Paginator->sort('credit_card_type'); ?></th>
			<th><?php echo $this->Paginator->sort('expiration_date'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('reservation_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($creditcards as $creditcard): ?>
	<tr>
		<td><?php echo h($creditcard['Creditcard']['credit_card_no']); ?>&nbsp;</td>
		<td><?php echo h($creditcard['Creditcard']['credit_card_type']); ?>&nbsp;</td>
		<td><?php echo h($creditcard['Creditcard']['expiration_date']); ?>&nbsp;</td>
		<td><?php echo h($creditcard['Creditcard']['id']); ?>&nbsp;</td>
		<td><?php echo h($creditcard['Creditcard']['created']); ?>&nbsp;</td>
		<td><?php echo h($creditcard['Creditcard']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($creditcard['Reservation']['id'], array('controller' => 'reservations', 'action' => 'view', $creditcard['Reservation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $creditcard['Creditcard']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $creditcard['Creditcard']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $creditcard['Creditcard']['id']), null, __('Are you sure you want to delete # %s?', $creditcard['Creditcard']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Creditcard'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reservations'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation'), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
