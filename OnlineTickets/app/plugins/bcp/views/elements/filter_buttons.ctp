<?php
echo $html->image($databaseMenus->image_path().'refresh.png', array(
	'alt' => __('Clear Filter', true),
	'title' => __('Clear Filter', true),
	'onclick' => 'clearForm()'
));
echo $form->submit($databaseMenus->image_path().'filter.png', array(
	'div' => false,
	'alt' => __('Apply Filter', true),
	'title' => __('Apply Filter', true),
	'style' => 'width:22px; height:22px;',
));
?>