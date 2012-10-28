<div class="fares view">
<h2><?php  echo __('Fare'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fare['Fare']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($fare['Fare']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($fare['Fare']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight Restrictions'); ?></dt>
		<dd>
			<?php echo h($fare['Fare']['weight_restrictions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flight'); ?></dt>
		<dd>
			<?php echo $this->Html->link($fare['Flight']['id'], array('controller' => 'flights', 'action' => 'view', $fare['Flight']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($fare['Fare']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($fare['Fare']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fare'), array('action' => 'edit', $fare['Fare']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fare'), array('action' => 'delete', $fare['Fare']['id']), null, __('Are you sure you want to delete # %s?', $fare['Fare']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fares'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fare'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flights'), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flight'), array('controller' => 'flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
