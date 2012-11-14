<div class="specificFlights view">
<h2><?php  __('SpecificFlight');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('No Of Available Business Class Seats'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specificFlight['SpecificFlight']['no_of_available_business_class_seats']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('No Of Available Economy Class Seats'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specificFlight['SpecificFlight']['no_of_available_economy_class_seats']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specificFlight['SpecificFlight']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Arrival Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specificFlight['SpecificFlight']['arrival_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Departure Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specificFlight['SpecificFlight']['departure_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flight'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($specificFlight['Flight']['id'], array('controller' => 'flights', 'action' => 'view', $specificFlight['Flight']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specificFlight['SpecificFlight']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specificFlight['SpecificFlight']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Airplane'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($specificFlight['Airplane']['id'], array('controller' => 'airplanes', 'action' => 'view', $specificFlight['Airplane']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit SpecificFlight', true), array('action' => 'edit', $specificFlight['SpecificFlight']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete SpecificFlight', true), array('action' => 'delete', $specificFlight['SpecificFlight']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $specificFlight['SpecificFlight']['id'])); ?> </li>
		<li><?php echo $html->link(__('List SpecificFlights', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New SpecificFlight', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Flights', true), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Flight', true), array('controller' => 'flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Airplanes', true), array('controller' => 'airplanes', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Airplane', true), array('controller' => 'airplanes', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Reservations');?></h3>
	<?php if (!empty($specificFlight['Reservation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Seat No'); ?></th>
		<th><?php __('Seat Type'); ?></th>
		<th><?php __('Id'); ?></th>
		<th><?php __('Fare Id'); ?></th>
		<th><?php __('Specific Flight Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($specificFlight['Reservation'] as $reservation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $reservation['seat_no'];?></td>
			<td><?php echo $reservation['seat_type'];?></td>
			<td><?php echo $reservation['id'];?></td>
			<td><?php echo $reservation['fare_id'];?></td>
			<td><?php echo $reservation['specific_flight_id'];?></td>
			<td><?php echo $reservation['created'];?></td>
			<td><?php echo $reservation['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'reservations', 'action' => 'view', $reservation['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'reservations', 'action' => 'edit', $reservation['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'reservations', 'action' => 'delete', $reservation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reservation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
