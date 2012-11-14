<div class="flights form">
<?php echo $form->create('Airport');?>
	<fieldset>
 		<legend><?php __('Edit Airport');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('airline');
		echo $form->input('fly_monday');
		echo $form->input('fly_tuesday');
		echo $form->input('fly_wednesday');
		echo $form->input('fly_thursday');
		echo $form->input('fly_friday');
		echo $form->input('fly_saturday');
		echo $form->input('fly_sunday');
		echo $form->input('scheduled_arrival_time');
		echo $form->input('scheduled_departure_time');
		echo $form->input('arrival_airport');
		echo $form->input('departure_airport');
		echo $form->input('Specific');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Airport.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Airport.id'))); ?></li>
		<li><?php echo $html->link(__('List Flights', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Fares', true), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fare', true), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
