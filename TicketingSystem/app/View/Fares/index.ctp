<div class="fares index">
	<h2><?php echo __('Fares'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('weight_restrictions'); ?></th>
			<th><?php echo $this->Paginator->sort('flight_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($fares as $fare): ?>
	<tr>
		<td><?php echo h($fare['Fare']['id']); ?>&nbsp;</td>
		<td><?php echo h($fare['Fare']['amount']); ?>&nbsp;</td>
		<td><?php echo h($fare['Fare']['type']); ?>&nbsp;</td>
		<td><?php echo h($fare['Fare']['weight_restrictions']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fare['Flight']['id'], array('controller' => 'flights', 'action' => 'view', $fare['Flight']['id'])); ?>
		</td>
		<td><?php echo h($fare['Fare']['created']); ?>&nbsp;</td>
		<td><?php echo h($fare['Fare']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fare['Fare']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $fare['Fare']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $fare['Fare']['id']), null, __('Are you sure you want to delete # %s?', $fare['Fare']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fare'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Flights'), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flight'), array('controller' => 'flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
