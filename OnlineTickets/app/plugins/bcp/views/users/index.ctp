<?php
/* SVN FILE: $Id$ */
/**
 * Index user view.
 *
 * Index user view for Bancer Control Panel Plugin.
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
<div class="users index">
	<h2><?php __('Users');?></h2>
	<?php echo $this->element('paginator_counter'); ?>
	<?php echo $form->create('User', array('class' => 'filter' ,'url' => array('action' => 'index'))); ?>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo $paginator->sort('id');?></th>
				<th><?php echo $paginator->sort('username');?></th>
				<th><?php echo $paginator->sort('group_id');?></th>
				<th class="actions"><?php __('Actions');?></th>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><?php echo $form->input('username', array('label' => false, 'div' => false)); ?></td>
				<td><?php echo $form->input('Group.name', array('label' => false, 'div' => false)); ?></td>
				<td class="actions"><?php echo $this->element('filter_buttons'); ?></td>
			</tr>
		<?php
		$i = 0;
		foreach ($users as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $user['User']['id']; ?>
				</td>
				<td>
					<?php echo $user['User']['username']; ?>
				</td>
				<td>
					<?php
						echo $html->link(
							$user['Group']['name'],
							array('controller'=> 'groups', 'action'=>'view', $user['Group']['id'])
						);
					?>
				</td>
				<td class="actions">
					<?php
					echo $databaseMenus->makeMenu($actionsMenu, 'actions', $user['User']['id'], $user['User']['username']);
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $form->end(); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New User', true), array('action' => 'add')); ?></li>
	</ul>
</div>
<?php echo $this->element('paginator_links'); ?>
