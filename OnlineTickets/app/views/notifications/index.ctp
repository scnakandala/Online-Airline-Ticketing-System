<div class="notifications index">
<h2><?php __('Notifications');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('is_read');?></th>
	<th><?php echo $paginator->sort('message');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('customer_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($notifications as $notification):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $notification['Notification']['id']; ?>
		</td>
		<td>
			<?php echo $notification['Notification']['is_read']; ?>
		</td>
		<td>
			<?php echo $notification['Notification']['message']; ?>
		</td>
		<td>
			<?php echo $notification['Notification']['created']; ?>
		</td>
		<td>
			<?php echo $notification['Notification']['modified']; ?>
		</td>
		<td>
			<?php echo $html->link($notification['Customer']['id'], array('controller' => 'customers', 'action' => 'view', $notification['Customer']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $notification['Notification']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $notification['Notification']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $notification['Notification']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $notification['Notification']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Notification', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

