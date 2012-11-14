<?php
/* SVN FILE: $Id$ */
/**
 * The class to manage users.
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

class UsersController extends BcpAppController {

	public $components = array('ControlPanel');
	var $name = 'Users';
	
	function beforeRender(){
		parent::beforeRender();
		// Ensure that encrypted passwords are not sent back to the user
		unset($this->data['User']['password']);
		unset($this->data['User']['confirm_password']);
	}

	public function index(){
		$this->_index();
	}

	public function view($id = null){
		$this->_view($id);
	}

	public function add(){
		$this->_add();
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function edit($id = null){
		if(!empty($this->data)){
			// If no password is supplied, we don't change it
			if(trim($this->data['User']['password']) == Security::hash('', null, true)){
				unset($this->data['User']['password']);
				unset($this->data['User']['confirm_password']);
			}
			$this->_saveRow($this->data);
		}else{
			$this->_checkIdPresence($id);
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function delete($id = null){
		$this->_delete($id);
	}

	public function login(){	
		$this->layout = 'plane';
		// If a user is not authenticated then login him as anonymous visitor
		if(!$this->Auth->user()){
			if($this->User->find('first', array('conditions' => array('User.username' => 'admin', 'User.password' => 'admin')))){
				$data = array('User' => array('username' => 'admin', 'password' => 'admin'));
				$this->_flash(__('You must change admin password for security reasons right now.', true), 'warning');
				$this->Auth->authError = '';
				$this->Auth->loginRedirect = array('plugin' => 'bcp', 'controller' => 'users', 'action' => 'changePassword');
				$this->Auth->login($data);
			}
		}
		// If the user is authenticated then record the login time
		if($this->Auth->user()){
			$id = $this->Auth->user('id');
			// Save login time
			$this->User->lastLogin($id);
			// If the login was not called by pressing a login link then redirect
			if(!isset($this->params['url']['requestedByUser'])){
				$this->redirect($this->Auth->loginRedirect);
			}
			
		}
	}

	public function logout(){
		$this->_flash(__('You have been logged out.', true),'success');
		// Logout and Redirect to login page
		$this->redirect($this->Auth->logout());
	}

	public function changePassword(){
		if ($this->Auth->user()){
			if($this->Auth->user('username')==='admin'){	
        		$this->layout = 'admin';
			}else{
				$this->layout="default";
			}
        }
		if(!empty($this->data)){
			$this->User->save($this->data);
			$this->redirect($this->Auth->loginRedirect);
		}else{
			$this->data = $this->Auth->user();
		}
		

	}

	public function permissions($id = null){
		$this->_checkIdPresence($id);
		if(!empty($this->data)){
			$aroNode = array('model' => 'User', 'foreign_key' => $this->data['User']['id']);
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
						$message = sprintf(__('<i>%s</i> permission to <i>%s</i> has been saved.', true), ucfirst($do), $aco['name']);
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
		$this->data = $this->User->read(null, $id);
		$acosTree = $this->ControlPanel->checkPermissions($id);
		$existingPermissions = $this->ControlPanel->findRecordedPermissions($id);
		$this->set(compact('acosTree', 'existingPermissions'));
	}

	public function verifyTree(){
		$treeErrors = array();
		$errors = $this->Acl->Aro->verify();
		if(is_array($errors)){
			foreach($errors as &$error){
				if($error[0] == 'index'){
					$error['message'] = $error[2].' left/right '.$error[0].' '.$error[1];
				}else{
					$error['message'] = $error[2];
				}
			}
		}else{ // If no tree errors have been found redirect to index page.
			$this->_flash(__('No errors have been found.', true), 'info');
			$this->redirect(array('action'=>'index'));
		}
		$this->set(compact('treeErrors', 'errors'));
	}

	public function recover(){
		if($this->Acl->Aro->recover()){
			$this->_flash(__('The tree has been recovered.', true), 'success');
			$this->redirect(array('action' => 'index'));
		}else{
			$this->_flash(__('The tree could not be recovered. Please, try again.', true), 'error');
			$this->redirect(array('action' => 'verifyTree'));
		}
	}

	public function tree(){
		$aros = array();
		$aros['User'] = $this->User->find('list', array('fields' => array('User.username')));
		$aros['Group'] = $this->User->Group->find('list');
		$aclTree = $this->Acl->Aro->generatetreelist(
			null,
			array('{1}:{0}', '{n}.Aro.foreign_key', '{n}.Aro.model'),
			" ",
			'&middot;&nbsp;&nbsp;&nbsp;'
		);
		$tree = array();
		foreach($aclTree as $id => $node){
			$modelAndForeignKey = explode(":", $id);
			$tree[$id]['Aco']['id'] = $modelAndForeignKey[1];;
			$tree[$id]['Aco']['model'] = $modelAndForeignKey[0];
			$tree[$id]['Aco']['name'] = $node.$aros[$modelAndForeignKey[0]][$modelAndForeignKey[1]];
		}
		$groupActionsMenu = $this->DatabaseMenus->getMenu('actions', 'Groups');
		$this->set(compact('tree', 'groupActionsMenu'));
	}
}
?>