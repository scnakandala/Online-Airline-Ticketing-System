<div class="customers view">
<h2><?php  __('Customer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $customer['Customer']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $customer['Customer']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $customer['Customer']['phone_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $customer['Customer']['email_address']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $customer['Customer']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $customer['Customer']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $customer['Customer']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reservation'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($customer['Reservation']['id'], array('controller' => 'reservations', 'action' => 'view', $customer['Reservation']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Customer', true), array('action' => 'edit', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Customer', true), array('action' => 'delete', $customer['Customer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $customer['Customer']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Customers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Customer', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Notifications', true), array('controller' => 'notifications', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Notification', true), array('controller' => 'notifications', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Notifications');?></h3>
	<?php if (!empty($customer['Notification'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Is Read'); ?></th>
		<th><?php __('Message'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Customer Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($customer['Notification'] as $notification):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $notification['id'];?></td>
			<td><?php echo $notification['is_read'];?></td>
			<td><?php echo $notification['message'];?></td>
			<td><?php echo $notification['created'];?></td>
			<td><?php echo $notification['modified'];?></td>
			<td><?php echo $notification['customer_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'notifications', 'action' => 'view', $notification['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'notifications', 'action' => 'edit', $notification['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'notifications', 'action' => 'delete', $notification['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $notification['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Notification', true), array('controller' => 'notifications', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
