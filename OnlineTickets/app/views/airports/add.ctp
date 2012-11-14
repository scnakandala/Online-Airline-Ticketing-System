<div class="airports form">
<?php echo $form->create('Airport');?>
	<fieldset>
 		<legend><?php __('Add Airport');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('city');
		echo $form->input('country');
		echo $form->input('no_of_terminals');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Airports', true), array('action' => 'index'));?></li>
	</ul>
</div>
