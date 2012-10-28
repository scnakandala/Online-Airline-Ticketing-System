<div class="reservations index">
	<h2><?php echo __('Reservations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('seat_no'); ?></th>
			<th><?php echo $this->Paginator->sort('seat_type'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('fare_id'); ?></th>
			<th><?php echo $this->Paginator->sort('specific_flight_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($reservations as $reservation): ?>
	<tr>
		<td><?php echo h($reservation['Reservation']['seat_no']); ?>&nbsp;</td>
		<td><?php echo h($reservation['Reservation']['seat_type']); ?>&nbsp;</td>
		<td><?php echo h($reservation['Reservation']['id']); ?>&nbsp;</td>
		<td><?php echo h($reservation['Reservation']['fare_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reservation['SpecificFlight']['id'], array('controller' => 'specific_flights', 'action' => 'view', $reservation['SpecificFlight']['id'])); ?>
		</td>
		<td><?php echo h($reservation['Reservation']['created']); ?>&nbsp;</td>
		<td><?php echo h($reservation['Reservation']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reservation['Reservation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reservation['Reservation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reservation['Reservation']['id']), null, __('Are you sure you want to delete # %s?', $reservation['Reservation']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Reservation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Specific Flights'), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Flight'), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Creditcards'), array('controller' => 'creditcards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creditcard'), array('controller' => 'creditcards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
