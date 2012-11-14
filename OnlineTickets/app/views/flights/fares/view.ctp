<div class="fares view">
<h2><?php  __('Fare');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fare['Fare']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fare['Fare']['amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fare['Fare']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Weight Restrictions'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fare['Fare']['weight_restrictions']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flight'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($fare['Flight']['id'], array('controller' => 'flights', 'action' => 'view', $fare['Flight']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fare['Fare']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fare['Fare']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Fare', true), array('action' => 'edit', $fare['Fare']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Fare', true), array('action' => 'delete', $fare['Fare']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fare['Fare']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Fares', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fare', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Flights', true), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Flight', true), array('controller' => 'flights', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Reservations');?></h3>
	<?php if (!empty($fare['Reservation'])):?>
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
		foreach ($fare['Reservation'] as $reservation):
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
