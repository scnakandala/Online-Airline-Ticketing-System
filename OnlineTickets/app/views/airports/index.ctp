<div class="airports index">
<h2><?php __('Airports');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('city');?></th>
	<th><?php echo $paginator->sort('country');?></th>
	<th><?php echo $paginator->sort('no_of_terminals');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($airports as $airport):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $airport['Airport']['id']; ?>
		</td>
		<td>
			<?php echo $airport['Airport']['name']; ?>
		</td>
		<td>
			<?php echo $airport['Airport']['city']; ?>
		</td>
		<td>
			<?php echo $airport['Airport']['country']; ?>
		</td>
		<td>
			<?php echo $airport['Airport']['no_of_terminals']; ?>
		</td>
		<td>
			<?php echo $airport['Airport']['created']; ?>
		</td>
		<td>
			<?php echo $airport['Airport']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $airport['Airport']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $airport['Airport']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $airport['Airport']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $airport['Airport']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Airport', true), array('action' => 'add')); ?></li>
	</ul>
</div>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
