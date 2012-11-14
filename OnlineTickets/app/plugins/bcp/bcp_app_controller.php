<?php
/* SVN FILE: $Id$ */
/**
 * The parent class to all controllers of PoundCake Control Panel Plugin.
 *
 * This file is plugin-wide controller file. You can put all
 * plugin-wide controller-related methods here.
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
 
 * 06.02.2010 - fix in _index(). $varNameForIndex was added and inflectored to format variable name properly.
 */

class BcpAppController extends AppController {

	public $components = array('Acl', 'Auth', 'Security', 'Bcp.Filter', 'Bcp.DatabaseMenus', 'Bcp.Layouts');
	public $helpers = array('Html', 'Form', 'Javascript', 'Bcp.DatabaseMenus');

	function beforeFilter(){
		parent::beforeFilter();
		$this->layout="permarinus_blue";
		//Configure AuthComponent
		$this->Auth->authorize = 'actions';
		$this->Auth->authError = __('You do not have permission to access the page you just selected.', true);
		$this->Auth->loginAction = array('plugin' => 'bcp', 'controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = array('plugin' => 'bcp', 'controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('plugin'=>null,'controller' => 'pages', 'action' => 'home');
		//$this->Auth->autoRedirect = false; // Set to false in order to save last_login time
		//$this->Auth->allow('logout'); // Allow logout to everybody
		//$this->Auth->allow('changePassword'); // if the user is anonymous he should not be allowed to change password
	}

	function beforeRender(){
		parent::beforeRender();
		$this->disableCache();
	}

	protected function _index(){
		$currentModelName = $this->_currentModelName();
		$this->{$currentModelName}->recursive = 0;
		$filter = $this->Filter->process($this);
		$this->set('url', $this->Filter->url);
		$varNameForIndex = Inflector::variable($this->params['controller']);
		// Set the variable for the view file named the same as the current controller
		$this->set($varNameForIndex, $this->paginate(null, $filter));

		//debug($this->_queriesCnt);
		/*$db =& ConnectionManager::getInstance();
		$connected =& $db->getDataSource('default');
		print_r($connected);*/
	}

	protected function _view($id = null){
		$this->_checkIdPresence($id);
		$currentModelName = $this->_currentModelName();
		/* Retrieve current controller name without 'Controller' word at the end
		 * and singularize it. */
		$varNameForView = Inflector::singularize($this->params['controller']);
		// Set variable for the view
		$this->set($varNameForView, $this->{$currentModelName}->read(null, $id));
	}

	protected function _add(){
		if(!empty($this->data)){
			$this->_createRow($this->data);
		}
	}

	protected function _edit($id = null){
		$currentModelName = $this->_currentModelName();
		if(!empty($this->data)){
			$this->_saveRow($this->data);
		}else{
			$this->_checkIdPresence($id);
			$this->data = $this->{$currentModelName}->read(null, $id);
		}
	}

	protected function _delete($id = null){
		$currentModelName = $this->_currentModelName();
		$this->_checkIdPresence($id);
		if($this->{$currentModelName}->del($id)){
			$this->_flash(__('The record has been deleted.', true), 'info');
			$this->redirect(array('action' => 'index'));
		}
	}

	protected function _currentModelName(){
		/* Retrieve current controller name without 'Controller' word at the end,
		 * singularize it and capitalize the first letter. */
		return Inflector::classify($this->params['controller']);
	}
	
	protected function _saveRow($data, $redirect = 'index'){
		$currentModelName = $this->_currentModelName();
		$this->{$currentModelName}->set($data);
		if($this->{$currentModelName}->validates()){
			if($this->{$currentModelName}->save($data)){
				$this->_flash(__('The entry has been saved.', true), 'success');
				if($redirect != 'noredirect'){
					$this->redirect(array('action' => $redirect));
				}
			}else{
				$this->_flash(__('The entry could not be saved. Please, try again.', true), 'error');
			}
		}else{
			$this->_flash(__('The entry could not be saved. Correct invalid data.', true), 'error');
		}
	}

	protected function _createRow($data, $redirect = 'index'){
		$currentModelName = $this->_currentModelName();
		$this->{$currentModelName}->create();
		$this->_saveRow($data, $redirect);
	}

	/**
	 * 
	 * @param int $id
	 * @param string $redirect. If 'noredirect' is provided then no redirection occurs.
	 * @return unknown_type
	 */
	protected function _checkIdPresence($id = null, $redirect = 'index'){
		if(!$id){
			$this->_flash(__('Invalid request. No id has been provided.', true), 'error');
			if($redirect != 'noredirect'){
				$this->redirect(array('action' => $redirect));
			}
		}
	}

	/** 
	 * Multiple flash messages
	 * 
	 * @param string $message - Message to be displayed
	 * @param string $type - Message type (message, warning, error, success)
	 * @link http://mrphp.com.au/code/code-category/cakephp/cakephp-1-2/multiple-flash-messages-style-cakephp
	 */
	/* Examples:
	$this->_flash(__('Normal message.', true),'message');
	$this->_flash(__('Info message.', true),'info');
	$this->_flash(__('Success message.', true),'success');
	$this->_flash(__('Warning message.', true),'warning');
	$this->_flash(__('Error message.', true),'error');
	*/
	protected function _flash($message, $type = 'message'){
		$messages = (array)$this->Session->read('Message.multiFlash');
		$messages[] = array(
			'message' => $message,
			'layout' => 'default',
			'params' => array('class' => 'multi-'.$type)
		);
		$this->Session->write('Message.multiFlash', $messages);
	}
}
?>