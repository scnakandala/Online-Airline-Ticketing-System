<?php
/* SVN FILE: $Id$ */
/**
 * Add/Edit setting form view.
 *
 * Add/Edit setting form view for Bancer Control Panel Plugin.
 *
 * PHP version 5
 * 
 * (C) Copyright 2009, Valerij Bancer (http://bancer.sourceforge.net)
 *
 * Licensed under GNU Lesser GPL License
 * 
 * This file is part of PoundCake Control Panel.
 * 
 * PoundCake Control Panel is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * PoundCake Control Panel is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with Bancer Control Panel. If not, see <http://www.gnu.org/licenses/>.
 *
 * @filesource
 * @copyright		Copyright 2009, Valerij Bancer (http://bancer.sourceforge.net)
 * @link			http://bancer.sourceforge.net PoundCake Control Panel
 * @package			
 * @subpackage		
 * @since			PoundCake Control Panel v 0.9
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://www.gnu.org/licenses/lgpl.txt GNU Lesser General Public License
 */

echo $form->input('name', array( 
	'before' => '<div class="tip-message"> '.__('Enter the short human readable name of the setting.', true).'</div>',
	'error' => array(
		'notEmpty' => __("The name must not be empty.", true),
		'maxLength' => __("The name should not be longer than 255 characters.", true),
		'isUnique' => __('This name has already been taken.', true),
	)
));
echo $form->input('description', array( 
	'before' => '<div class="tip-message"> '.__('Enter the description of the setting. Be as specific as you want.', true).'</div>',
	'error' => array(
		'notEmpty' => __("The name must not be empty.", true),
	)
));

$categoryOptions = array( 
	'before' => '<div class="tip-message"> '.__("Enter the category of the setting to be used in the application's code. Use letters and numbers only.", true).'</div>',
	'error' => array(
		'notEmpty' => __("The category must not be empty.", true),
		'maxLength' => __("The category should not be longer than 255 characters.", true),
		'alphaNumeric' => __('The category should contain only letters and numbers.', true),
	)
);
if($form->value('Setting.id')){
	$categoryOptions['readonly'] = 'readonly';
}
echo $form->input('category', $categoryOptions);


$settingOptions = array( 
	'before' => '<div class="tip-message"> '.__("Enter the name of the setting to be used in the application's code. Use letters and numbers only.", true).'</div>',
	'error' => array(
		'notEmpty' => __("The setting must not be empty.", true),
		'maxLength' => __("The setting should not be longer than 255 characters.", true),
		'isUnique' => __('This name has already been taken.', true),
		'alphaNumeric' => __('The setting should contain only letters and numbers.', true),
	)
);
if($form->value('Setting.id')){
	$settingOptions['readonly'] = 'readonly';
}
echo $form->input('setting', $settingOptions);

$valuesOptions['error']['allowedValue'] = __("This value is not allowed.", true);
if($form->value('Setting.id') AND isset($values)){
	$valuesOptions['options'] = $values;
	$valuesOptions['selected'] = $form->value('Setting.value');
}
echo $form->input('value', $valuesOptions);
?>