<div class="creditcards index">
<h2><?php __('Creditcards');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('credit_card_no');?></th>
	<th><?php echo $paginator->sort('credit_card_type');?></th>
	<th><?php echo $paginator->sort('expiration_date');?></th>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('reservation_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($creditcards as $creditcard):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $creditcard['Creditcard']['credit_card_no']; ?>
		</td>
		<td>
			<?php echo $creditcard['Creditcard']['credit_card_type']; ?>
		</td>
		<td>
			<?php echo $creditcard['Creditcard']['expiration_date']; ?>
		</td>
		<td>
			<?php echo $creditcard['Creditcard']['id']; ?>
		</td>
		<td>
			<?php echo $creditcard['Creditcard']['created']; ?>
		</td>
		<td>
			<?php echo $creditcard['Creditcard']['modified']; ?>
		</td>
		<td>
			<?php echo $html->link($creditcard['Reservation']['id'], array('controller' => 'reservations', 'action' => 'view', $creditcard['Reservation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $creditcard['Creditcard']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $creditcard['Creditcard']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $creditcard['Creditcard']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $creditcard['Creditcard']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Creditcard', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Reservations', true), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Reservation', true), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

