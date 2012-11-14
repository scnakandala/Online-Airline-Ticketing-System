<?php
/* SVN FILE: $Id$ */
/**
 * Layouts component.
 *
 * Layouts component that allowes to choose the application's layout.
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

class LayoutsComponent extends Object{

	public $components = array('Session');

	public function initialize(&$controller) {
		$view_paths = Configure::read('viewPaths');
		array_unshift($view_paths, (APP.'plugins'.DS.'bcp'.DS.'views'.DS));
		Configure::write('viewPaths', $view_paths);

		$layout = $this->__setLayout();
		$controller->layout = $layout;
	}

	private function __setLayout(){
		$layout = $this->Session->read('Settings.bcp.layout');
		if(empty($layout)){
			$Setting  = ClassRegistry::init('Setting');
			$layoutSetting = $Setting->findBySetting('layout');
			$layout = $layoutSetting['Setting']['value'];
			if($layout !== null){
				$this->Session->write('Settings.bcp.layout', $layout);
			}
		}
		return $layout;
	}
}
?>