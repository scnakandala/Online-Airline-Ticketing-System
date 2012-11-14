<div class="flights view">
<h2><?php  __('Flight');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Airline'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['airline']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fly Monday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['fly_monday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fly Tuesday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['fly_tuesday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fly Wednesday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['fly_wednesday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fly Thursday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['fly_thursday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fly Friday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['fly_friday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fly Saturday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['fly_saturday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fly Sunday'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['fly_sunday']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Scheduled Arrival Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['scheduled_arrival_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Scheduled Departure Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['scheduled_departure_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Arrival Airport'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['arrival_airport']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Departure Airport'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['departure_airport']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $flight['Flight']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Flight', true), array('action' => 'edit', $flight['Flight']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Flight', true), array('action' => 'delete', $flight['Flight']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $flight['Flight']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Flights', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Flight', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Fares', true), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fare', true), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Fares');?></h3>
	<?php if (!empty($flight['Fare'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Weight Restrictions'); ?></th>
		<th><?php __('Flight Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($flight['Fare'] as $fare):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $fare['id'];?></td>
			<td><?php echo $fare['amount'];?></td>
			<td><?php echo $fare['type'];?></td>
			<td><?php echo $fare['weight_restrictions'];?></td>
			<td><?php echo $fare['flight_id'];?></td>
			<td><?php echo $fare['created'];?></td>
			<td><?php echo $fare['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'fares', 'action' => 'view', $fare['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'fares', 'action' => 'edit', $fare['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'fares', 'action' => 'delete', $fare['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fare['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Fare', true), array('controller' => 'fares', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Specific Flights');?></h3>
	<?php if (!empty($flight['Specific'])):?>
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
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($flight['Specific'] as $specific):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $specific['no_of_available_business_class_seats'];?></td>
			<td><?php echo $specific['no_of_available_economy_class_seats'];?></td>
			<td><?php echo $specific['id'];?></td>
			<td><?php echo $specific['arrival_time'];?></td>
			<td><?php echo $specific['departure_time'];?></td>
			<td><?php echo $specific['flight_id'];?></td>
			<td><?php echo $specific['created'];?></td>
			<td><?php echo $specific['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'specific_flights', 'action' => 'view', $specific['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'specific_flights', 'action' => 'edit', $specific['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'specific_flights', 'action' => 'delete', $specific['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $specific['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Specific', true), array('controller' => 'specific_flights', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
