<?php
/* SVN FILE: $Id$ */
/**
 * Display group view.
 *
 * Display group view for Bancer Control Panel Plugin.
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
	echo $databaseMenus->makeMenu($actionsMenu, 'extra', $group['Group']['id'], $group['Group']['name']);
	?>
</div>
<div class="groups view">
	<h2><?php __('Group');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
			echo $html->link($parent['Group']['name'], array(
				'controller'=> 'groups', 'action'=>'view', $parent['Group']['id']
			));
			?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="">
	<?php
	echo $databaseMenus->makeMenu($usersExtraMenu, 'extra');
	?>
</div>
<div class="related">
	<h3><?php __('Related Users');?></h3>
	<?php if(!empty($group['User'])):?>
		<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php __('Id'); ?></th>
				<th><?php __('Username'); ?></th>
				<th><?php __('Last login'); ?></th>
				<th><?php __('Group Id'); ?></th>
				<th class="actions"><?php __('Actions');?></th>
			</tr>
			<?php
			$i = 0;
			foreach ($group['User'] as $user):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $user['id'];?></td>
					<td><?php echo $user['username'];?></td>
					<td><?php echo $user['last_login'];?></td>
					<td><?php echo $user['group_id'];?></td>
					<td class="actions">
						<?php
						echo $databaseMenus->makeMenu($usersActionsMenu, 'actions', $user['id'], $user['username']);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>
