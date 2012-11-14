<div class="airplanes view">
<h2><?php  __('Airplane');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $airplane['Airplane']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $airplane['Airplane']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Max Business Class Seats'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $airplane['Airplane']['max_business_class_seats']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Max Economy Class Seats'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $airplane['Airplane']['max_economy_class_seats']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $airplane['Airplane']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $airplane['Airplane']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Airplane', true), array('action' => 'edit', $airplane['Airplane']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Airplane', true), array('action' => 'delete', $airplane['Airplane']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $airplane['Airplane']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Airplanes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Airplane', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific Flight', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Specific Flights');?></h3>
	<?php if (!empty($airplane['SpecificFlight'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('No Of Available Business Class Seats'); ?></th>
		<th><?php __('No Of Available Economy Class Seats'); ?></th>
		<th><?php __('Id'); ?></th>
		<th><?php __('Arrival Time'); ?></th>
		<th><?php __('Departure Time'); ?></th>
		<th><?php __('Flight Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Airplane Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($airplane['SpecificFlight'] as $specificFlight):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $specificFlight['no_of_available_business_class_seats'];?></td>
			<td><?php echo $specificFlight['no_of_available_economy_class_seats'];?></td>
			<td><?php echo $specificFlight['id'];?></td>
			<td><?php echo $specificFlight['arrival_time'];?></td>
			<td><?php echo $specificFlight['departure_time'];?></td>
			<td><?php echo $specificFlight['flight_id'];?></td>
			<td><?php echo $specificFlight['created'];?></td>
			<td><?php echo $specificFlight['modified'];?></td>
			<td><?php echo $specificFlight['airplane_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'specific_flights', 'action' => 'view', $specificFlight['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'specific_flights', 'action' => 'edit', $specificFlight['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'specific_flights', 'action' => 'delete', $specificFlight['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $specificFlight['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Specific Flight', true), array('controller' => 'specific_flights', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
