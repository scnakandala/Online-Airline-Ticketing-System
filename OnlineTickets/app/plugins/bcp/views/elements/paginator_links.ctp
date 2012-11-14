<div class="paging">
	<?php
	echo $paginator->prev('<< '.__('previous', true), array('url' => array($url)), null, array('class'=>'disabled'));
	echo ' | ';
	echo $paginator->numbers();
	echo ' | ';
	echo $paginator->next(__('next', true).' >>', array('url' => array($url)), null, array('class'=>'disabled'));
	?>
</div>