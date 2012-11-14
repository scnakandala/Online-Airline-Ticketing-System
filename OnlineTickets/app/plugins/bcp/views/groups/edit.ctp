<?php
/* SVN FILE: $Id$ */
/**
 * Edit group view.
 *
 * Edit group view for Bancer Control Panel Plugin.
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
<div class="bcp_act">
	<?php
	echo $databaseMenus->makeMenu($actionsMenu, 'extra', $form->value('Group.id'), $form->value('Group.name'));
	?>
</div>
<div class="groups form">
	<?php echo $form->create('Group');?>
		<fieldset>
			<legend><?php __('Edit Group');?></legend>
			<?php
			echo $form->input('id');
			echo $form->input('name', array(
					'error' => array(
						'notEmpty' => __('This field must not be empty.', true),
						'isUnique' => __('This name has been already taken.', true),
					)
				));
			echo $form->input('parent_id', array('empty' => true));
			?>
		</fieldset>
	<?php echo $form->end('Submit');?>
</div>