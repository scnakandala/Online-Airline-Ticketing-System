<div class="reservations index">
<h2><?php __('Reservations');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('seat_no');?></th>
	<th><?php echo $paginator->sort('seat_type');?></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('fare_id');?></th>
	<th><?php echo $paginator->sort('specific_flight_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($reservations as $reservation):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $reservation['Reservation']['seat_no']; ?>
		</td>
		<td>
			<?php echo $reservation['Reservation']['seat_type']; ?>
		</td>
		<td>
			<?php echo $reservation['Reservation']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($reservation['Fare']['id'], array('controller' => 'fares', 'action' => 'view', $reservation['Fare']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($reservation['SpecificFlight']['id'], array('controller' => 'specific_flights', 'action' => 'view', $reservation['SpecificFlight']['id'])); ?>
		</td>
		<td>
			<?php echo $reservation['Reservation']['created']; ?>
		</td>
		<td>
			<?php echo $reservation['Reservation']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $reservation['Reservation']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $reservation['Reservation']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $reservation['Reservation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reservation['Reservation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Reservation', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Fares', true), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fare', true), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific Flight', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Creditcards', true), array('controller' => 'creditcards', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Creditcard', true), array('controller' => 'creditcards', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

