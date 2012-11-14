<?php
/* SVN FILE: $Id$ */
/**
 * Index view.
 *
 * Index view for the home of Bancer Control Panel Plugin.
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
<div class="bcp index">
	<h2><?php __('Control Panel');?></h2>
	<ul class="bcp_home">
		<li>
			<?php
				echo $html->image($databaseMenus->image_path().'home64.png', array(
					"alt" => "Home",
					"title" => "Home",
					'url' => array('plugin' => null, 'controller' => 'pages', 'action' => 'index')
				));
				echo __('Home');
			?>
		</li>
		<li>
			<?php
				echo $html->image($databaseMenus->image_path().'user64.png', array(
					"alt" => "Users",
					"title" => "Users",
					'url' => array('controller' => 'users', 'action' => 'index')
				));
				echo __('Users');
			?>
		</li>
		<li>
			<?php
				echo $html->image($databaseMenus->image_path().'group64.png', array(
					"alt" => "Groups",
					"title" => "Groups",
					'url' => array('controller' => 'groups', 'action' => 'index')
				));
				echo __('Groups');
			?>
		</li>
		<li>
			<?php
				echo $html->image($databaseMenus->image_path().'menu64.png', array(
					"alt" => "Menus",
					"title" => "Menus",
					'url' => array('controller' => 'menus', 'action' => 'index'),
				));
				echo __('Menus');
			?>
		</li>
		<li>
			<?php
				echo $html->image($databaseMenus->image_path().'settings64.png', array(
					"alt" => "Settings",
					"title" => "Settings",
					'url' => array('controller' => 'settings', 'action' => 'index'),
				));
				echo __('Settings');
			?>
		</li>
	</ul>
</div>