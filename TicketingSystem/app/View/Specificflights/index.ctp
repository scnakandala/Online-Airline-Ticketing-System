<div class="specificflights index">
	<h2><?php echo __('Specificflights'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_available_business_class_seats'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_available_economy_class_seats'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('arrival_time'); ?></th>
			<th><?php echo $this->Paginator->sort('departure_time'); ?></th>
			<th><?php echo $this->Paginator->sort('flight_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($specificflights as $specificflight): ?>
	<tr>
		<td><?php echo h($specificflight['Specificflight']['date']); ?>&nbsp;</td>
		<td><?php echo h($specificflight['Specificflight']['no_of_available_business_class_seats']); ?>&nbsp;</td>
		<td><?php echo h($specificflight['Specificflight']['no_of_available_economy_class_seats']); ?>&nbsp;</td>
		<td><?php echo h($specificflight['Specificflight']['id']); ?>&nbsp;</td>
		<td><?php echo h($specificflight['Specificflight']['arrival_time']); ?>&nbsp;</td>
		<td><?php echo h($specificflight['Specificflight']['departure_time']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($specificflight['Flight']['id'], array('controller' => 'flights', 'action' => 'view', $specificflight['Flight']['id'])); ?>
		</td>
		<td><?php echo h($specificflight['Specificflight']['created']); ?>&nbsp;</td>
		<td><?php echo h($specificflight['Specificflight']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $specificflight['Specificflight']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $specificflight['Specificflight']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $specificflight['Specificflight']['id']), null, __('Are you sure you want to delete # %s?', $specificflight['Specificflight']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Specificflight'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Flights'), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flight'), array('controller' => 'flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
