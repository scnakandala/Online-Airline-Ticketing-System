<?php
/* SVN FILE: $Id$ */
/**
 * The class to manage groups of users.
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

class GroupsController extends BcpAppController {

	public $components = array('ControlPanel');

	public function index(){
		$listNames = $this->Group->find('list', array('fields' => array('Group.name')));
		$tree = $this->ControlPanel->tree($listNames);
		$this->set(compact('tree'));
	}

	public function view($id = null){
		$this->_view($id);
		// Get actions menu for users controller to be used in 'related' div in the view
		$usersActionsMenu = $this->DatabaseMenus->getMenu('actions', 'Users');
		$usersExtraMenu = $this->DatabaseMenus->getMenu('extra', 'Users');
		// For the parent group
		$parent = $this->Group->findParentDetails($this->Group->data['Group']['parent_id']);
		$this->set(compact('usersExtraMenu', 'usersActionsMenu', 'parent'));
	}

	public function add(){
		$this->_add();
		// For the parent group
		$groups = $this->Group->find('list');
		$this->set('parents', $groups);
	}

	public function edit($id = null) {
		$this->_edit($id);
		// For the parent group
		$groups = $this->Group->find('list');
		$this->set('parents', $groups);
	}

	public function delete($id = null) {
		$this->_delete($id);
	}

	public function permissions($id = null){
		$this->_checkIdPresence($id);
		if(!empty($this->data)){
			$aroNode = array('model' => 'Group', 'foreign_key' => $this->data['Group']['id']);
			foreach($this->data['Acos'] as $aco){
				if(!empty($aco['permission'])){
					$do = '';
					if($aco['permission'] == '1'){
						$do = 'allow';
					}elseif($aco['permission'] == '-1'){
						$do = 'deny';
					}
					$acoNode = array('model' => $aco['model'], 'foreign_key' => $aco['foreign_key']);
					if($this->Acl->{$do}($aroNode, $acoNode, '*')){
						$message = sprintf(__('<i>%s</i> permission to <i>%s</i> has been saved.', true),ucfirst($do), $aco['name']);
						$this->_flash($message, 'success');
					}else{
						$message = sprintf(
							__('<i>%s</i> permission to <i>%s</i> could not be saved. Please, try again.', true),
							ucfirst($do), $aco['name']
						);
						$this->_flash($message, 'error');
					}
				}
			}
		}
		// Get ARO for the current Group and all related ACOs from the db
		$this->data = $this->Group->read(null, $id);
		$acosTree = $this->ControlPanel->checkPermissions($id);
		$existingPermissions = $this->ControlPanel->findRecordedPermissions($id);
		$this->set(compact('acosTree', 'existingPermissions'));
	}
}
?>