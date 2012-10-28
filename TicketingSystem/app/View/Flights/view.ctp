<div class="flights view">
<h2><?php  echo __('Flight'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Airline'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['airline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fly Monday'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['fly_monday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fly Tuesday'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['fly_tuesday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fly Wednesday'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['fly_wednesday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fly Thursday'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['fly_thursday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fly Friday'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['fly_friday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fly Saturday'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['fly_saturday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fly Sunday'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['fly_sunday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scheduled Arrival Time'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['scheduled_arrival_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scheduled Departure Time'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['scheduled_departure_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arrival Airport'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['arrival_airport']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departure Airport'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['departure_airport']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($flight['Flight']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Flight'), array('action' => 'edit', $flight['Flight']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Flight'), array('action' => 'delete', $flight['Flight']['id']), null, __('Are you sure you want to delete # %s?', $flight['Flight']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Flights'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flight'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fares'), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fare'), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specificflights'), array('controller' => 'specificflights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specificflight'), array('controller' => 'specificflights', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Fares'); ?></h3>
	<?php if (!empty($flight['Fare'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Weight Restrictions'); ?></th>
		<th><?php echo __('Flight Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($flight['Fare'] as $fare): ?>
		<tr>
			<td><?php echo $fare['id']; ?></td>
			<td><?php echo $fare['amount']; ?></td>
			<td><?php echo $fare['type']; ?></td>
			<td><?php echo $fare['weight_restrictions']; ?></td>
			<td><?php echo $fare['flight_id']; ?></td>
			<td><?php echo $fare['created']; ?></td>
			<td><?php echo $fare['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'fares', 'action' => 'view', $fare['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'fares', 'action' => 'edit', $fare['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'fares', 'action' => 'delete', $fare['id']), null, __('Are you sure you want to delete # %s?', $fare['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fare'), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Specificflights'); ?></h3>
	<?php if (!empty($flight['Specificflight'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('No Of Available Business Class Seats'); ?></th>
		<th><?php echo __('No Of Available Economy Class Seats'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Arrival Time'); ?></th>
		<th><?php echo __('Departure Time'); ?></th>
		<th><?php echo __('Flight Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($flight['Specificflight'] as $specificflight): ?>
		<tr>
			<td><?php echo $specificflight['date']; ?></td>
			<td><?php echo $specificflight['no_of_available_business_class_seats']; ?></td>
			<td><?php echo $specificflight['no_of_available_economy_class_seats']; ?></td>
			<td><?php echo $specificflight['id']; ?></td>
			<td><?php echo $specificflight['arrival_time']; ?></td>
			<td><?php echo $specificflight['departure_time']; ?></td>
			<td><?php echo $specificflight['flight_id']; ?></td>
			<td><?php echo $specificflight['created']; ?></td>
			<td><?php echo $specificflight['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'specificflights', 'action' => 'view', $specificflight['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'specificflights', 'action' => 'edit', $specificflight['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'specificflights', 'action' => 'delete', $specificflight['id']), null, __('Are you sure you want to delete # %s?', $specificflight['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Specificflight'), array('controller' => 'specificflights', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
