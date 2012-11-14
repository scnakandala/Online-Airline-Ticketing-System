<div class="specificFlights index">
<h2><?php __('SpecificFlights');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('no_of_available_business_class_seats');?></th>
	<th><?php echo $paginator->sort('no_of_available_economy_class_seats');?></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('arrival_time');?></th>
	<th><?php echo $paginator->sort('departure_time');?></th>
	<th><?php echo $paginator->sort('flight_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('airplane_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($specificFlights as $specificFlight):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $specificFlight['SpecificFlight']['no_of_available_business_class_seats']; ?>
		</td>
		<td>
			<?php echo $specificFlight['SpecificFlight']['no_of_available_economy_class_seats']; ?>
		</td>
		<td>
			<?php echo $specificFlight['SpecificFlight']['id']; ?>
		</td>
		<td>
			<?php echo $specificFlight['SpecificFlight']['arrival_time']; ?>
		</td>
		<td>
			<?php echo $specificFlight['SpecificFlight']['departure_time']; ?>
		</td>
		<td>
			<?php echo $html->link($specificFlight['Flight']['id'], array('controller' => 'flights', 'action' => 'view', $specificFlight['Flight']['id'])); ?>
		</td>
		<td>
			<?php echo $specificFlight['SpecificFlight']['created']; ?>
		</td>
		<td>
			<?php echo $specificFlight['SpecificFlight']['modified']; ?>
		</td>
		<td>
			<?php echo $html->link($specificFlight['Airplane']['id'], array('controller' => 'airplanes', 'action' => 'view', $specificFlight['Airplane']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $specificFlight['SpecificFlight']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $specificFlight['SpecificFlight']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $specificFlight['SpecificFlight']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $specificFlight['SpecificFlight']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New SpecificFlight', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Flights', true), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Flight', true), array('controller' => 'flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Airplanes', true), array('controller' => 'airplanes', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Airplane', true), array('controller' => 'airplanes', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

