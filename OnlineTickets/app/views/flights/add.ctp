<div class="flights form">
<?php echo $form->create('Flight');?>
	<fieldset>
 		<legend><?php __('Add Flight');?></legend>
	<?php
		echo $form->input('airline');
		echo $form->input('fly_monday',array('type'=>'checkbox'));
		echo $form->input('fly_tuesday',array('type'=>'checkbox'));
		echo $form->input('fly_wednesday',array('type'=>'checkbox'));
		echo $form->input('fly_thursday',array('type'=>'checkbox'));
		echo $form->input('fly_friday',array('type'=>'checkbox'));
		echo $form->input('fly_saturday',array('type'=>'checkbox'));
		echo $form->input('fly_sunday',array('type'=>'checkbox'));
		echo $form->input('scheduled_arrival_time',array('type'=>'time'));
		echo $form->input('scheduled_departure_time',array('type'=>'time'));
		echo $form->input('arrival_airport', array('options' => $airports)); 
		echo $form->input('departure_airport', array('options' => $airports)); 
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Flights', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Fares', true), array('controller' => 'fares', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fare', true), array('controller' => 'fares', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
