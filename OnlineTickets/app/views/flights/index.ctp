<div class="flights index">
<h2><?php __('Flights');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('airline');?></th>
	<th><?php echo $paginator->sort('fly_monday');?></th>
	<th><?php echo $paginator->sort('fly_tuesday');?></th>
	<th><?php echo $paginator->sort('fly_wednesday');?></th>
	<th><?php echo $paginator->sort('fly_thursday');?></th>
	<th><?php echo $paginator->sort('fly_friday');?></th>
	<th><?php echo $paginator->sort('fly_saturday');?></th>
	<th><?php echo $paginator->sort('fly_sunday');?></th>
	<th><?php echo $paginator->sort('scheduled_arrival_time');?></th>
	<th><?php echo $paginator->sort('scheduled_departure_time');?></th>
	<th><?php echo $paginator->sort('arrival_flight');?></th>
	<th><?php echo $paginator->sort('departure_flight');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($flights as $flight):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $flight['Flight']['id']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['airline']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['fly_monday']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['fly_tuesday']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['fly_wednesday']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['fly_thursday']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['fly_friday']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['fly_saturday']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['fly_sunday']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['scheduled_arrival_time']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['scheduled_departure_time']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['arrival_airport']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['departure_airport']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['created']; ?>
		</td>
		<td>
			<?php echo $flight['Flight']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $flight['Flight']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $flight['Flight']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $flight['Flight']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $flight['Flight']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Flight', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Fares', true), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fare', true), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific Flight', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

