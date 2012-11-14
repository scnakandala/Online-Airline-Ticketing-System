<?php
/* SVN FILE: $Id$ */
/**
 * User permissions view.
 *
 * User permissions view for Bancer Control Panel Plugin.
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
	echo $databaseMenus->makeMenu($actionsMenu, 'extra', $this->data['User']['id'], $this->data['User']['username']);
	?>
</div>
<div class="user permissions tree">
	<?php
	echo $form->create('User', array('action' => 'permissions'));
		echo $form->hidden('id');
		?>
		<h2>
			<?php
			echo $this->data['User']['username'].' ';
			__('User Permissions');
			?>
		</h2>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php __('Menu Item');?></th>
				<th><?php __('Permission');?></th>
				<th colspan="2" class="actions"><?php __('Actions');?></th>
			</tr>
			<?php
			$i = 0;
			foreach($acosTree as $id => $node):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
				?>
			<tr<?php echo $class;?>>
				<td class="tree">
					<?php echo $node['name']; ?>
				</td>
				<td>
					<?php
					if($node['allowed'] == 1){
						echo $html->image('/bcp/img/unlock.png', array(
							'alt' => __('Allowed', true),
							'title' => __('Allowed', true)
						));
					}else{
						echo $html->image('/bcp/img/lock.png', array(
							'alt' => __('Denied', true),
							'title' => __('Denied', true)
						));
					}
					?>
				</td>
				<td class="actions">
					<?php
					if(isset($existingPermissions[$id])){
						$selected = $existingPermissions[$id];
					}else{
						$selected = null;
					}
					echo $form->hidden('Acos.'.$id.'.model', array('value' => $node[1]));
					echo $form->hidden('Acos.'.$id.'.foreign_key', array('value' => $node[2]));
					echo $form->hidden('Acos.'.$id.'.name', array('value' => str_replace('&middot;&nbsp;&nbsp;&nbsp;', '', $node['name'])));
					echo $form->radio(
						'Acos.'.$id.'.permission',
						array('1' => 'Allow', '-1' => 'Deny'),
						array('default' => $selected, 'legend' => false, 'separator' => '</td><td class="actions">')
					);
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php
		/* TODO: Debug: After "Clear" button is pressed and several permissions are selected and "Submit"
		 * button is pressed $this->data in the controller is empty. The form submits nothing.
		 * Fix it if possible.*/ ?>
		<div class="submit">
			<?php /*echo $form->button('Clear', array('type'=>'button', 'onclick' => 'clearForm();'));*/ ?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->button('Reset', array('type'=>'reset')); ?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->button('Submit', array('type'=>'submit')); ?>
		</div>
		<?php
		
	echo $form->end();
	?>
</div>