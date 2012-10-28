<div class="reservations view">
<h2><?php  echo __('Reservation'); ?></h2>
	<dl>
		<dt><?php echo __('Seat No'); ?></dt>
		<dd>
			<?php echo h($reservation['Reservation']['seat_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seat Type'); ?></dt>
		<dd>
			<?php echo h($reservation['Reservation']['seat_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reservation['Reservation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fare Id'); ?></dt>
		<dd>
			<?php echo h($reservation['Reservation']['fare_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specific Flight'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservation['SpecificFlight']['id'], array('controller' => 'specific_flights', 'action' => 'view', $reservation['SpecificFlight']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($reservation['Reservation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($reservation['Reservation']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reservation'), array('action' => 'edit', $reservation['Reservation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reservation'), array('action' => 'delete', $reservation['Reservation']['id']), null, __('Are you sure you want to delete # %s?', $reservation['Reservation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Flights'), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Flight'), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Creditcards'), array('controller' => 'creditcards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creditcard'), array('controller' => 'creditcards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Creditcards'); ?></h3>
	<?php if (!empty($reservation['Creditcard'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Credit Card No'); ?></th>
		<th><?php echo __('Credit Card Type'); ?></th>
		<th><?php echo __('Expiration Date'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Reservation Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($reservation['Creditcard'] as $creditcard): ?>
		<tr>
			<td><?php echo $creditcard['credit_card_no']; ?></td>
			<td><?php echo $creditcard['credit_card_type']; ?></td>
			<td><?php echo $creditcard['expiration_date']; ?></td>
			<td><?php echo $creditcard['id']; ?></td>
			<td><?php echo $creditcard['created']; ?></td>
			<td><?php echo $creditcard['modified']; ?></td>
			<td><?php echo $creditcard['reservation_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'creditcards', 'action' => 'view', $creditcard['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'creditcards', 'action' => 'edit', $creditcard['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'creditcards', 'action' => 'delete', $creditcard['id']), null, __('Are you sure you want to delete # %s?', $creditcard['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Creditcard'), array('controller' => 'creditcards', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Customers'); ?></h3>
	<?php if (!empty($reservation['Customer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Phone Number'); ?></th>
		<th><?php echo __('Email Address'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Reservation Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($reservation['Customer'] as $customer): ?>
		<tr>
			<td><?php echo $customer['first_name']; ?></td>
			<td><?php echo $customer['last_name']; ?></td>
			<td><?php echo $customer['phone_number']; ?></td>
			<td><?php echo $customer['email_address']; ?></td>
			<td><?php echo $customer['id']; ?></td>
			<td><?php echo $customer['created']; ?></td>
			<td><?php echo $customer['modified']; ?></td>
			<td><?php echo $customer['reservation_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'customers', 'action' => 'view', $customer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'customers', 'action' => 'edit', $customer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'customers', 'action' => 'delete', $customer['id']), null, __('Are you sure you want to delete # %s?', $customer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
