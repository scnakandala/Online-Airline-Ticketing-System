<div class="flights index">
	<h2><?php echo __('Flights'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('airline'); ?></th>
			<th><?php echo $this->Paginator->sort('fly_monday'); ?></th>
			<th><?php echo $this->Paginator->sort('fly_tuesday'); ?></th>
			<th><?php echo $this->Paginator->sort('fly_wednesday'); ?></th>
			<th><?php echo $this->Paginator->sort('fly_thursday'); ?></th>
			<th><?php echo $this->Paginator->sort('fly_friday'); ?></th>
			<th><?php echo $this->Paginator->sort('fly_saturday'); ?></th>
			<th><?php echo $this->Paginator->sort('fly_sunday'); ?></th>
			<th><?php echo $this->Paginator->sort('scheduled_arrival_time'); ?></th>
			<th><?php echo $this->Paginator->sort('scheduled_departure_time'); ?></th>
			<th><?php echo $this->Paginator->sort('arrival_airport'); ?></th>
			<th><?php echo $this->Paginator->sort('departure_airport'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($flights as $flight): ?>
	<tr>
		<td><?php echo h($flight['Flight']['id']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['airline']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['fly_monday']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['fly_tuesday']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['fly_wednesday']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['fly_thursday']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['fly_friday']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['fly_saturday']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['fly_sunday']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['scheduled_arrival_time']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['scheduled_departure_time']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['arrival_airport']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['departure_airport']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['created']); ?>&nbsp;</td>
		<td><?php echo h($flight['Flight']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $flight['Flight']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $flight['Flight']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $flight['Flight']['id']), null, __('Are you sure you want to delete # %s?', $flight['Flight']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Flight'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Fares'), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fare'), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specificflights'), array('controller' => 'specificflights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specificflight'), array('controller' => 'specificflights', 'action' => 'add')); ?> </li>
	</ul>
</div>
