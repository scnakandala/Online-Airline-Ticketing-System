<div class="specificflights view">
<h2><?php  echo __('Specificflight'); ?></h2>
	<dl>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($specificflight['Specificflight']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Available Business Class Seats'); ?></dt>
		<dd>
			<?php echo h($specificflight['Specificflight']['no_of_available_business_class_seats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Available Economy Class Seats'); ?></dt>
		<dd>
			<?php echo h($specificflight['Specificflight']['no_of_available_economy_class_seats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($specificflight['Specificflight']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arrival Time'); ?></dt>
		<dd>
			<?php echo h($specificflight['Specificflight']['arrival_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departure Time'); ?></dt>
		<dd>
			<?php echo h($specificflight['Specificflight']['departure_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flight'); ?></dt>
		<dd>
			<?php echo $this->Html->link($specificflight['Flight']['id'], array('controller' => 'flights', 'action' => 'view', $specificflight['Flight']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($specificflight['Specificflight']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($specificflight['Specificflight']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Specificflight'), array('action' => 'edit', $specificflight['Specificflight']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Specificflight'), array('action' => 'delete', $specificflight['Specificflight']['id']), null, __('Are you sure you want to delete # %s?', $specificflight['Specificflight']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Specificflights'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specificflight'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flights'), array('controller' => 'flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flight'), array('controller' => 'flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
