<div class="airplanes index">
	<h2><?php echo __('Airplanes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('max_business_class_seats'); ?></th>
			<th><?php echo $this->Paginator->sort('max_economy_class_seats'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('specific_flight_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($airplanes as $airplane): ?>
	<tr>
		<td><?php echo h($airplane['Airplane']['id']); ?>&nbsp;</td>
		<td><?php echo h($airplane['Airplane']['type']); ?>&nbsp;</td>
		<td><?php echo h($airplane['Airplane']['max_business_class_seats']); ?>&nbsp;</td>
		<td><?php echo h($airplane['Airplane']['max_economy_class_seats']); ?>&nbsp;</td>
		<td><?php echo h($airplane['Airplane']['created']); ?>&nbsp;</td>
		<td><?php echo h($airplane['Airplane']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($airplane['SpecificFlight']['id'], array('controller' => 'specific_flights', 'action' => 'view', $airplane['SpecificFlight']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $airplane['Airplane']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $airplane['Airplane']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $airplane['Airplane']['id']), null, __('Are you sure you want to delete # %s?', $airplane['Airplane']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Airplane'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Specific Flights'), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Flight'), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
