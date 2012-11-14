<?php
/* SVN FILE: $Id$ */
/**
 * Add/Edit user form view.
 *
 * Add/Edit user form view for Bancer Control Panel Plugin.
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
?>
<?php
echo $form->input('username', array( 
	'before' => '<div class="tip-message"> '.__('Enter the name that will be used for login', true).'</div>',
	'error' => array(
		'between' => __('The username should be from 5 to 30 characters long.', true),
		'alphaNumeric' => __('The username should contain only letters and numbers.', true),
		'isUnique' => __('This username has been already taken.', true),
	)
));
echo $form->input('confirm_password', array(
	'label' => __('Password', true),
	'type' => 'password',
	'error' => array(
		'comparePasswords' => __('Typed passwords did not match.', true),
		'minLength' => __('The password should be at least 8 characters long.', true),
		'notEmpty' => __('The password must not be empty.', true)
	)
));
echo $form->input('password', array(
	'label' => __('Repeat Password', true)
));
echo $form->input('group_id', array(
	'empty' => '['.__('Select one from the list', true).']',
	'error' => array(
		'numeric' => __('One group must be selected.', true)
	)
));
?>