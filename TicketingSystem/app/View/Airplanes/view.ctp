<div class="airplanes view">
<h2><?php  echo __('Airplane'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($airplane['Airplane']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($airplane['Airplane']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Business Class Seats'); ?></dt>
		<dd>
			<?php echo h($airplane['Airplane']['max_business_class_seats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Economy Class Seats'); ?></dt>
		<dd>
			<?php echo h($airplane['Airplane']['max_economy_class_seats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($airplane['Airplane']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($airplane['Airplane']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specific Flight'); ?></dt>
		<dd>
			<?php echo $this->Html->link($airplane['SpecificFlight']['id'], array('controller' => 'specific_flights', 'action' => 'view', $airplane['SpecificFlight']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Airplane'), array('action' => 'edit', $airplane['Airplane']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Airplane'), array('action' => 'delete', $airplane['Airplane']['id']), null, __('Are you sure you want to delete # %s?', $airplane['Airplane']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Airplanes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Airplane'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Flights'), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Flight'), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
