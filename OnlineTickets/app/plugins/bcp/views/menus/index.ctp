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
<div class="menus index">
	<h2><?php __('Menus');?></h2>
	<?php echo $this->element('paginator_counter'); ?>
	<?php echo $form->create('Menu', array('class' => 'filter' ,'url' => array('action' => 'index'))); ?>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>
					<?php echo $paginator->sort(__('Id', true), 'id', array('url' => array($url))); ?>
				</th>
				<th><?php echo $paginator->sort('type');?></th>
				<th><?php echo $paginator->sort('name');?></th>
				<th><?php echo $paginator->sort('Parent','Parent.name');?></th>
				<th><?php echo $paginator->sort('plugin');?></th>
				<th><?php echo $paginator->sort('controller');?></th>
				<th><?php echo $paginator->sort('method');?></th>
				<th><?php echo $paginator->sort('published');?></th>
				<th class="actions"><?php __('Actions');?></th>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><?php echo $form->input('type', array('label' => false, 'div' => false)); ?></td>
				<td><?php echo $form->input('name', array('label' => false, 'div' => false)); ?></td>
				<td><?php echo $form->input('Parent.name', array('label' => false, 'div' => false)); ?></td>
				<td><?php echo $form->input('plugin', array('label' => false, 'div' => false)); ?></td>
				<td><?php echo $form->input('controller', array('label' => false, 'div' => false)); ?></td>
				<td><?php echo $form->input('method', array('label' => false, 'div' => false)); ?></td>
				<td><?php echo $form->input('published', array('label' => false, 'div' => false)); ?></td>
				<td class="actions"><?php echo $this->element('filter_buttons'); ?></td>
			</tr>
			<?php
			$i = 0;
			foreach($menus as $menu):
				$class = null;
				if($i++ % 2 == 0){
					$class = ' class="altrow"';
				}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $menu['Menu']['id']; ?></td>
					<td><?php echo $menu['Menu']['type']; ?></td>
					<td><?php echo $menu['Menu']['name']; ?></td>
					<td>
						<?php
						echo $html->link(
							$menu['Parent']['name'],
							array('controller'=> 'menus', 'action'=>'view', $menu['Parent']['id'])
						);
						?> &nbsp;
					</td>
					<td><?php echo $menu['Menu']['plugin']; ?></td>
					<td><?php echo $menu['Menu']['controller']; ?></td>
					<td><?php echo $menu['Menu']['method']; ?>&nbsp;</td>
					<td>
						<?php
						if($menu['Menu']['published'] == 1){
							echo __('Yes', true);
						}else{
							echo __('No', true);
						}
						?>
					</td>
					<td class="actions">
						<?php
						echo $databaseMenus->makeMenu($actionsMenu, 'actions', $menu['Menu']['id'], $menu['Menu']['name']);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php echo $form->end(); ?>
</div>
<?php echo $this->element('paginator_links'); ?>