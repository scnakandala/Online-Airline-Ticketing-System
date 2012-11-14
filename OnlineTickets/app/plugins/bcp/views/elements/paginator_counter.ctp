<p>
	<?php
	echo $paginator->counter(array(
		'format' => __(
			'Page %page% of %pages%, showing %current% records out of %count% total,
				starting on record %start%, ending on %end%',
			true
		)
	));
	$paginator->options(array('url' => array($url)));
	?>
</p>