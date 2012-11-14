<?php
/* SVN FILE: $Id$ */
/**
 * User and groups tree view.
 *
 * User and groups tree view for Bancer Control Panel Plugin.
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
<div class="users tree">
	<h2><?php __('Groups And Users Tree');?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php __('Name');?></th>
			<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach($tree as $node):
			$class = null;
			if($i++ % 2 == 0){
				$class = ' class="altrow"';
			}
			?>
			<tr<?php echo $class;?>>
				<td class="tree">
					<?php
					echo $html->image(
						$databaseMenus->image_path().strtolower($node['Aco']['model']).'.png',
						array('alt' => $node['Aco']['model'], 'title' => $node['Aco']['model'])
					);
					echo '&nbsp;'.$node['Aco']['name'];
					?>
				</td>
				<td class="actions">
					<?php
					// Remove any html entities from the name
					$node['Aco']['name'] = preg_replace("/&#?[a-z0-9]{2,8};/i", "", $node['Aco']['name']);
					if($node['Aco']['model'] == 'Group'){
						$menu = $groupActionsMenu;
					}else{
						$menu = $actionsMenu;
					}
					echo $databaseMenus->makeMenu($menu, 'actions', $node['Aco']['id'], $node['Aco']['name']);
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>