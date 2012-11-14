<div class="searchTickets form">
	<?php echo $form->create('Ticketings', array('action' => 'index'));?>
		<fieldset>
			<legend><?php __('Search For Air Tickets');?></legend>
			<?php
			echo $form->input('from',array('options' => $airports));
			echo $form->input('to',array('options' => $airports));
			echo $form->input('departure_date', array('type' => 'date'));
			echo $form->input('return_date', array('type' => 'date'));
			echo $form->input('airline',array('options' => $airlines));
			echo $form->input('seat_type',array('options' => array("Business","Economy")));
			?>
		</fieldset>
	<?php echo $form->end('Search');?>
</div>