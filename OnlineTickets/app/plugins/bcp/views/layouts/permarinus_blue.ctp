<?php
/* SVN FILE: $Id$ */
/**
 * Permarinus blue layout
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html -> charset(); ?>
	<title>
		<?php __('PoundCake Control Panel | '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		// If the user is logged in then create meta tags forbidding browser cache
		if($session->read('Auth.User.username') != 'anonymous'){
			echo $html->meta(array('http-equiv' => 'Cache-Control', 'content' => 'no-cache'));
			echo $html->meta(array('http-equiv' => 'Pragma', 'content' => 'no-cache'));
			echo $html->meta(array('http-equiv' => 'Expires', 'content' => 'Sat, 01-Jan-2000 00:00:00 GMT'));
		}
		echo $html->meta('icon');
		if(is_file(APP.'.htaccess')){
			echo $html->css(array(
				'/bcp/css/css_menu',
				'/bcp/css/bcp',
				'/bcp/css/permarinus_blue'
			));
		}else{
			echo $html->css(array(
				'../../plugins/bcp/vendors/css/css_menu',
				'../../plugins/bcp/vendors/css/bcp',
				'../../plugins/bcp/vendors/css/permarinus_blue'
			));
		}
		// Hide left column if 'oneColumnLayout' was set in the controller action for specific view
		if(isset($oneColumnLayout)){ ?>
			<style type="text/css">
				#left {
					display: none
				}
				#content {
					width: 95%;
				}
			</style>
		<?php }
				if(is_file(APP.'.htaccess')){
				echo $javascript->link('/bcp/js/bcp.js', true);
				}else{
				echo $javascript->link('../../plugins/bcp/vendors/js/bcp.js', true);
				}
				echo $scripts_for_layout;
	?>
</head>
<body onload="focusOnFirstInput();">
<div id="container">
		<div id="header">
			<span>
				<?php
					echo $html->link('ABC Online Air Ticket Reservation System',array('plugin' => null, 'controller' => 'pages', 'action' => 'index'));
				?>
			</span>
			<div><?php echo $databaseMenus -> auth_links(); ?></div>
			<div class="admin_index">	
			<ul class="admin_home">
				<li>
					<?php
					echo $html -> image($databaseMenus -> image_path() . 'home32.png', array("alt" => "Home", "title" => "Home", 'url' => array('plugin' => null, 'controller' => 'pages', 'action' => 'index')));
					?>
				</li>
				<li>
					<?php
					echo $html -> image($databaseMenus -> image_path() . 'user32.png', array("alt" => "Users", "title" => "Users", 'url' => array('plugin' => 'bcp', 'controller' => 'users', 'action' => 'index')));
					?>
				</li>
				<li>
					<?php
					echo $html -> image($databaseMenus -> image_path() . 'group32.png', array("alt" => "Groups", "title" => "Groups", 'url' => array('plugin' => 'bcp', 'controller' => 'groups', 'action' => 'index')));
					?>
				</li>
				<li>
					<?php
					echo $html -> image($databaseMenus -> image_path() . 'menu32.png', array("alt" => "Menus", "title" => "Menus", 'url' => array('plugin' => 'bcp', 'controller' => 'menus', 'action' => 'index'), ));
					?>
				</li>
				<li>
					<?php
					echo $html -> image($databaseMenus -> image_path() . 'settings32.png', array("alt" => "Settings", "title" => "Settings", 'url' => array('plugin' => 'bcp', 'controller' => 'settings', 'action' => 'index'), ));
					?>
				</li>
			</ul>
		</div>
		</div>	
		<div id="content_container">
			<div id="content">
				<?php echo $content_for_layout; ?>
			</div>
		</div>
		<div id="footer">
			powered by ABC software systems
		</div>
</div>
</body>
</html>