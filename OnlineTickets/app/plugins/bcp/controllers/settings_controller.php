<?php
/* SVN FILE: $Id$ */
/**
 * The class to manage settings.
 * 
 * The class to manage settings of Bancer Control Panel
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

class SettingsController extends BcpAppController {

	function index() {
		$this->_index();
		$this->set('oneColumnLayout', true);
	}

	function view($id = null) {
		$this->_view($id);
	}

	function add() {
		$this->_add();
	}

	function edit($id = null) {
		$this->_edit($id);
		if($this->data['Setting']['setting'] == 'layout'){
			$values = $this->Setting->availableLayouts();
			$this->set(compact('values'));
		}
	}

	function delete($id = null) {
		if($id == 1){
			$this->_flash(__('You cannot delete layout setting. It is imperative for Bancer Control Panle plugin.', true), 'error');
			$this->redirect(array('action'=>'index'));
		}else{
			$this->_delete($id);
		}
	}

}
?>