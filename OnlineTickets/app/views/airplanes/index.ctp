<div class="airplanes index">
<h2><?php __('Airplanes');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('type');?></th>
	<th><?php echo $paginator->sort('max_business_class_seats');?></th>
	<th><?php echo $paginator->sort('max_economy_class_seats');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($airplanes as $airplane):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $airplane['Airplane']['id']; ?>
		</td>
		<td>
			<?php echo $airplane['Airplane']['type']; ?>
		</td>
		<td>
			<?php echo $airplane['Airplane']['max_business_class_seats']; ?>
		</td>
		<td>
			<?php echo $airplane['Airplane']['max_economy_class_seats']; ?>
		</td>
		<td>
			<?php echo $airplane['Airplane']['created']; ?>
		</td>
		<td>
			<?php echo $airplane['Airplane']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $airplane['Airplane']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $airplane['Airplane']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $airplane['Airplane']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $airplane['Airplane']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Airplane', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific Flight', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

