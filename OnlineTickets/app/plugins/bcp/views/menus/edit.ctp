<?php
/* SVN FILE: $Id$ */
/**
 * Edit menu view.
 *
 * Edit menu view for Bancer Control Panel Plugin.
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
<div class="">
	<?php
	echo $databaseMenus->makeMenu($actionsMenu, 'extra', $form->value('Menu.id'), $form->value('Menu.name'));
	?>
</div>
<div class="menus form">
<?php echo $form->create('Menu');?>
	<fieldset>
		<legend><?php __('Edit Menu');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('type', array(
			'options' => array(
				'main' => 'main',
				'extra' => 'extra',
				'actions' => 'actions',
				'manual' => 'manual'
			),
			'error' => array(
				'notEmpty' => __('This field must not be empty.', true),
				'maxLength' => __('The entry is too long. It should not be longer than 255 symbols.', true),
				'inList' => __('Only "main", "extra", "actions", "manual" values allowed.', true),
			)
		));
		echo $form->input('name', array(
			'error' => array(
				'notEmpty' => __('This field must not be empty.', true),
				'isUnique' => __('This name has been already taken.', true),
				'maxLength' => __('The entry is too long. It should not be longer than 255 symbols.', true),
			)
		));
		echo $form->input('parent_id');
		echo $form->input('plugin', array(
			'readonly' => 'readonly',
			'error' => array(
				'maxLength' => __('The entry is too long. It should not be longer than 100 symbols.', true),
			)
		));
		echo $form->input('controller', array(
			'readonly' => 'readonly',
			'error' => array(
				'notEmpty' => __('This field must not be empty.', true),
				'maxLength' => __('The entry is too long. It should not be longer than 100 symbols.', true),
			)
		));
		echo $form->input('method', array(
			'readonly' => 'readonly',
			'error' => array(
				'maxLength' => __('The entry is too long. It should not be longer than 100 symbols.', true),
			)
		));
		echo $form->input('published');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>