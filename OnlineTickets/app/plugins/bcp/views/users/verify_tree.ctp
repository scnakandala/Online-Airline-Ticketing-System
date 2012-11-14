<?php
/* SVN FILE: $Id$ */
/**
 * Verify users and groups view.
 *
 * Verify users and groups view for Bancer Control Panel Plugin.
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
<div class="users verify">
	<h2><?php __('Groups And Users Tree Errors');?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php __('Id');?></th>
			<th><?php __('Error Type');?></th>
			<th><?php __('Error Message');?></th>
			<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach($errors as $nr => $err):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $err[1]; ?>
				</td>
				<td>
					<?php echo $err[0]; ?>
				</td>
				<td>
					<?php echo $err['message']; ?>
				</td>
				<td class="actions">
					<?php
					echo $html->link(
						$html->image('run.png', array(
							'alt' => __('Recover Tree', true),
							'title' => __('Recover Tree', true)
						)),
						array('action' => 'recover'),
						null,
						__('Are you sure you want to recover the tree?\nThe changes are irreversible.\nBack up the database first.', true),
						false
					);
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>