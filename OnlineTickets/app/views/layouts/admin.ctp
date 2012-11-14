<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html -> charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $html -> meta('icon');
	echo $html -> css(array('/bcp/css/css_menu', '/bcp/css/bcp'));
	echo $html -> css('cake.generic');

	echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<span>
				<?php
					echo $html->link('ABC Online Air Ticket Reservation System',array('controller'=>'','action'=>''));
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
		
		<div id="content">
			<?php $session -> flash();?>
			
			<div class="menu-actions">
				<ul>
					<li><?php echo $html->link(__('Airports', true), array('controller'=>'airports','action' => 'index')); ?></li>

					<li><?php echo $html->link(__('Reservations', true), array('controller'=>'reservations','action' => 'index')); ?></li>

					<li><?php echo $html->link(__('Notifications', true), array('controller'=>'notifications','action' => 'index')); ?></li>

					<li><?php echo $html->link(__('Flights', true), array('controller'=>'flights','action' => 'index')); ?></li>

					<li><?php echo $html->link(__('Customers', true), array('controller'=>'customers','action' => 'index')); ?></li>

					<li><?php echo $html->link(__('Credit Cards', true), array('controller'=>'creditcards','action' => 'index')); ?></li>
					
					<li><?php echo $html->link(__('Specific Flights', true), array('controller'=>'specific_flights','action' => 'index')); ?></li>
					
					<li><?php echo $html->link(__('Airplanes', true), array('controller'=>'airplanes','action' => 'index')); ?></li>
				</ul>

			</div>
			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			powered by ABC software
		</div>
	</div>
	<!--<?php echo $cakeDebug; ?>-->
</body>
</html>