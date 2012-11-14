<div class="airplanes form">
<?php echo $form->create('Airplane');?>
	<fieldset>
 		<legend><?php __('Add Airplane');?></legend>
	<?php
		echo $form->input('type');
		echo $form->input('max_business_class_seats');
		echo $form->input('max_economy_class_seats');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Airplanes', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Specific Flights', true), array('controller' => 'specific_flights', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Specific Flight', true), array('controller' => 'specific_flights', 'action' => 'add')); ?> </li>
	</ul>
</div>
