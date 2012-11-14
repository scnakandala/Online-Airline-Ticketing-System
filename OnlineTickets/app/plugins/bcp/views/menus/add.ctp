<?php
/* SVN FILE: $Id$ */
/**
 * Add menu view.
 *
 * Add menu view for Bancer Control Panel Plugin.
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
<div class="menus form">
<h2><?php __('Add Menus');?></h2>
<?php echo $form->create('Menu', array('action' => 'add', 'style' => 'width:100%'));?>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php __('Published');?></th>
		<th><?php __('Type');?></th>
		<th><?php __('Name');?></th>
		<th><?php __('Plugin');?></th>
		<th><?php __('Controller');?></th>
		<th><?php __('Method');?></th>
		<th><?php __('Parent');?></th>
		<th class="actions"><?php __('Add');?></th>
	</tr>
	<?php
	$i = 0;
	foreach($menus as $i => $menu):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		?>
		<tr<?php echo $class;?>>
			<td>
				<?php echo $form->input($i.'.published', array(
					'value' => $menu['Menu']['published'],
					'label' => false
				)); ?>
			</td>
			<td>
				<?php
				echo $form->input($i.'.type', array(
					'options' => array(
						'main' => 'main',
						'extra' => 'extra',
						'actions' => 'actions',
						'manual' => 'manual'
					),
					'selected' => $menu['Menu']['type'],
					'label' => false,
					'error' => array(
						'notEmpty' => __('This field must not be empty.', true),
						'maxLength' => __('The entry is too long. It should not be longer than 255 symbols.', true),
						'inList' => __('Only "main", "extra", "actions", "manual" values allowed.', true),
					)
				));
				?>
			</td>
			<td>
				<?php echo $form->input($i.'.name', array(
					'value' => $menu['Menu']['name'],
					'label' => false,
					'error' => array(
						'notEmpty' => __('This field must not be empty.', true),
						'isUnique' => __('This name has been already taken.', true),
						'maxLength' => __('The entry is too long. It should not be longer than 255 symbols.', true),
					)
				)); ?>
			</td>
			<td>
				<?php echo $form->input($i.'.plugin', array(
					'value' => $menu['Menu']['plugin'],
					'label' => false,
					'readonly' => 'readonly',
					'size' => strlen($menu['Menu']['plugin']) + 1,
					'error' => array(
						'maxLength' => __('The entry is too long. It should not be longer than 100 symbols.', true),
					)
				)); ?>
			</td>
			<td>
				<?php echo $form->input($i.'.controller', array(
					'value' => $menu['Menu']['controller'],
					'label' => false,
					'readonly' => 'readonly',
					'size' => strlen($menu['Menu']['controller']) + 1,
					'error' => array(
						'notEmpty' => __('This field must not be empty.', true),
						'maxLength' => __('The entry is too long. It should not be longer than 100 symbols.', true),
					)
				)); ?>
			</td>
			<td>
				<?php echo $form->input($i.'.method', array(
					'value' => $menu['Menu']['method'],
					'label' => false,
					'readonly' => 'readonly',
					'size' => strlen($menu['Menu']['method']) + 1,
					'error' => array(
						'maxLength' => __('The entry is too long. It should not be longer than 100 symbols.', true),
					)
				)); ?>
			</td>
			<td>
				<?php
				if(is_null($menu['Menu']['parent_id'])){
					$selected = $menu['Menu']['controller'];
				}else{
					$selected = $parents[$menu['Menu']['parent_id']];
				}
				
				echo $form->input($i.'.parent_id', array(
					'label' => false,
					// Only one option to select
					'options' => array($menu['Menu']['parent_id'] => $selected),
					'error' => array(
						'numeric' => __('No parent has been found in the database. Ensure that "Add" column of the
										parent menu has been checkmarked.', true),
					)
				)); ?>
			</td>
			<td class="actions" style="vertical-align: middle">
				<?php echo $form->checkbox('Menu.'.$i.'.add'); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<?php echo $form->end('Submit');?>
</div>