<div class="customers index">
<h2><?php __('Customers');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('first_name');?></th>
	<th><?php echo $paginator->sort('last_name');?></th>
	<th><?php echo $paginator->sort('phone_number');?></th>
	<th><?php echo $paginator->sort('email_address');?></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('reservation_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($customers as $customer):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $customer['Customer']['first_name']; ?>
		</td>
		<td>
			<?php echo $customer['Customer']['last_name']; ?>
		</td>
		<td>
			<?php echo $customer['Customer']['phone_number']; ?>
		</td>
		<td>
			<?php echo $customer['Customer']['email_address']; ?>
		</td>
		<td>
			<?php echo $customer['Customer']['id']; ?>
		</td>
		<td>
			<?php echo $customer['Customer']['created']; ?>
		</td>
		<td>
			<?php echo $customer['Customer']['modified']; ?>
		</td>
		<td>
			<?php echo $html->link($customer['Reservation']['id'], array('controller' => 'reservations', 'action' => 'view', $customer['Reservation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $customer['Customer']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $customer['Customer']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $customer['Customer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $customer['Customer']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Customer', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Notifications', true), array('controller' => 'notifications', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Notification', true), array('controller' => 'notifications', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

