<div class="fares index">
<h2><?php __('Fares');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('amount');?></th>
	<th><?php echo $paginator->sort('type');?></th>
	<th><?php echo $paginator->sort('weight_restrictions');?></th>
	<th><?php echo $paginator->sort('flight_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($fares as $fare):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $fare['Fare']['id']; ?>
		</td>
		<td>
			<?php echo $fare['Fare']['amount']; ?>
		</td>
		<td>
			<?php echo $fare['Fare']['type']; ?>
		</td>
		<td>
			<?php echo $fare['Fare']['weight_restrictions']; ?>
		</td>
		<td>
			<?php echo $html->link($fare['Flight']['id'], array('controller' => 'flights', 'action' => 'view', $fare['Flight']['id'])); ?>
		</td>
		<td>
			<?php echo $fare['Fare']['created']; ?>
		</td>
		<td>
			<?php echo $fare['Fare']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $fare['Fare']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $fare['Fare']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $fare['Fare']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fare['Fare']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Fare', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Flights', true), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Flight', true), array('controller' => 'flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

