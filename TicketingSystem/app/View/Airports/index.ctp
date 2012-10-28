<div class="airports index">
	<h2><?php echo __('Airports'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_terminals'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($airports as $airport): ?>
	<tr>
		<td><?php echo h($airport['Airport']['id']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['name']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['city']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['country']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['no_of_terminals']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['created']); ?>&nbsp;</td>
		<td><?php echo h($airport['Airport']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $airport['Airport']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $airport['Airport']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $airport['Airport']['id']), null, __('Are you sure you want to delete # %s?', $airport['Airport']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Airport'), array('action' => 'add')); ?></li>
	</ul>
</div>
