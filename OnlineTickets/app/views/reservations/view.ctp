<div class="reservations view">
<h2><?php  __('Reservation');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Seat No'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reservation['Reservation']['seat_no']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Seat Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reservation['Reservation']['seat_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reservation['Reservation']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fare'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($reservation['Fare']['id'], array('controller' => 'fares', 'action' => 'view', $reservation['Fare']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Specific Flight'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($reservation['SpecificFlight']['id'], array('controller' => 'specific_flights', 'action' => 'view', $reservation['SpecificFlight']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reservation['Reservation']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reservation['Reservation']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Reservation', true), array('action' => 'edit', $reservation['Reservation']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Reservation', true), array('action' => 'delete', $reservation['Reservation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reservation['Reservation']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Creditcards');?></h3>
	<?php if (!empty($reservation['Creditcard'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Credit Card No'); ?></th>
		<th><?php __('Credit Card Type'); ?></th>
		<th><?php __('Expiration Date'); ?></th>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Reservation Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($reservation['Creditcard'] as $creditcard):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $creditcard['credit_card_no'];?></td>
			<td><?php echo $creditcard['credit_card_type'];?></td>
			<td><?php echo $creditcard['expiration_date'];?></td>
			<td><?php echo $creditcard['id'];?></td>
			<td><?php echo $creditcard['created'];?></td>
			<td><?php echo $creditcard['modified'];?></td>
			<td><?php echo $creditcard['reservation_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'creditcards', 'action' => 'view', $creditcard['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'creditcards', 'action' => 'edit', $creditcard['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'creditcards', 'action' => 'delete', $creditcard['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $creditcard['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Creditcard', true), array('controller' => 'creditcards', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Customers');?></h3>
	<?php if (!empty($reservation['Customer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Phone Number'); ?></th>
		<th><?php __('Email Address'); ?></th>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Reservation Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($reservation['Customer'] as $customer):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $customer['first_name'];?></td>
			<td><?php echo $customer['last_name'];?></td>
			<td><?php echo $customer['phone_number'];?></td>
			<td><?php echo $customer['email_address'];?></td>
			<td><?php echo $customer['id'];?></td>
			<td><?php echo $customer['created'];?></td>
			<td><?php echo $customer['modified'];?></td>
			<td><?php echo $customer['reservation_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'customers', 'action' => 'view', $customer['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'customers', 'action' => 'edit', $customer['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'customers', 'action' => 'delete', $customer['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $customer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
