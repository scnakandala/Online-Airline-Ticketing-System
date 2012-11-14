<?php
/* SVN FILE: $Id$ */
/**
 * The class to manage menus.
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
 * 
 * 05.02.2010 - fixed naming conflict in _findACOsFromFiles()
 * 08.02.2010 - fixed add() - set oneColumnLayout to true
 */

class MenusController extends BcpAppController {

	public $components = array('ControlPanel');
	public $paginate = array(
		'order' => array(
			"Menu.controller" => "ASC",
			"Menu.method" => "ASC"
		)
	);

	public function index(){
		$this->_index();
		$this->set('oneColumnLayout', true);
	}

	public function view($id = null){
		$this->_view($id);
	}

	public function edit($id = null){
		$this->_edit($id);
		if($this->data['Menu']['method'] == null){
			$parents = $this->Menu->Parent->find('list', array(
				'conditions' => array(
					'OR' => array(
						array('Parent.method' => 'controllers'),
						array('Parent.method' => '')
					)
				),
				'order' => array('Parent.name')
			));
		}else{
			$parents = $this->Menu->Parent->find('list', array(
				'conditions' => array('Parent.id' => $this->data['Menu']['parent_id'])
			));
		}
		$this->set(compact('parents'));
	}

	public function delete($id = null){
		$child = $this->Menu->find('first', array('conditions' => array('Menu.parent_id' => $id)));
		// Allow delete any record except the root 'controllers' if it has no children
		if($id != 1 AND empty($child)){
			//Clear menus cache
			$this->DatabaseMenus->clearCache();
			$this->_delete($id);
		}else{
			if($id == 1){
				$this->_flash(__('The root for all menus cannot be deleted.', true),'error');
			}elseif(!empty($child)){
				$this->_flash(__('This menu item cannot be deleted because it has at least one child.', true),'error');
			}
			$this->redirect(array('action'=>'index'));
		}
	}

	public function add(){
		// If the form was submitted process the data and add ACOs to the db.
		if(!empty($this->data)){
			$invalidMenuFields = array();
			foreach($this->data['Menu'] as $key => $menuItem){
				if($menuItem['add'] == 1){
					/* If parent id is null then check that parent node is recorded in the database. */
					if(empty($menuItem['parent_id'])){
						$parent = $this->Menu->find('first', array(
							'conditions' => array(
								'Menu.controller' => $menuItem['controller'],
								'Menu.method' => ''
							)
						));
						// If parent menu item has been recorded in the database
						if(isset($parent['Menu']['id'])){
							$menuItem['parent_id'] = $parent['Menu']['id'];
						}
					}
					$menuItem = array('Menu' => $menuItem);
					// Validate fields before saving
					$this->Menu->set($menuItem);
					if(!$this->Menu->validates()){
						// save the validationErrors and reset for the next iteration
						$invalidMenuFields[$key] = $this->Menu->invalidFields();
					}else{
						$this->_createRow($menuItem, 'noredirect');
					}
				}
			}
			if(!empty($invalidMenuFields)){
				$this->Menu->validationErrors = $invalidMenuFields;
			}
		}
		// If the form was not submitted then retrieve the data to display the 
		// list of all available actions except those that are enabled already.
		$savedMenus = $this->Menu->find('all');
		$menus = array();
		$acosFromFiles = $this->_findACOsFromFiles();
		foreach($acosFromFiles as $aco){
			$menuItem = $this->_findMenuItem($savedMenus, $aco['controller'], $aco['method'], $aco['plugin']);
			if(!$menuItem){
				if(empty($aco['method'])){
					$aco['type'] = 'main';
					$aco['name'] = $aco['controller'];
					$aco['parent_id'] = 1;
				}else{
					if($aco['method'] == 'view' OR $aco['method'] == 'edit' OR $aco['method'] == 'delete'){
						$aco['type'] = 'actions';
					}else{
						$aco['type'] = 'extra';
					}
					if($aco['method'] == 'index'){
						$aco['name'] = __('List', true).' '.$aco['controller'];
					}else{
						$aco['name'] = $this->__makeMenuName($aco['controller'], $aco['method']);
					}
					$parent = $this->_findMenuItem($savedMenus, $aco['controller']);
					$aco['parent_id'] = $parent['Menu']['id'];
				}
				$menus[] = array('Menu' => array(
					'type' => $aco['type'],
					'name' => $aco['name'],
					'parent_id' => $aco['parent_id'],
					'plugin' => $aco['plugin'],
					'controller' => $aco['controller'],
					'method' => $aco['method'],
					'published' => 0
				));
			}
		}
		$parents = $this->Menu->Parent->find('list');
		$this->set(compact('parents', 'menus'));
		$this->set('oneColumnLayout', true);
	}

	public function tree(){
		$listNames = $this->Menu->find('list', array('fields' => array('Menu.name')));
		$tree = $this->ControlPanel->tree($listNames);
		$this->set(compact('tree'));
	}

	public function permissions($id = null){
		$this->_view($id);
		$groupsAndUsersLists = array();
		$groupsAndUsersLists['Groups'] = 
			ClassRegistry::init('Group')->find('list', array('fields' => array('Group.name')));
		$groupsAndUsersLists['Users'] = 
			ClassRegistry::init('User')->find('list', array('fields' => array('User.username')));
		$tree = $this->Acl->Aro->generatetreelist(
			null,
			"{n}.Aro.id",
			array(':{1}:{0}', '{n}.Aro.foreign_key', '{n}.Aro.model'),
			'&middot;&nbsp;&nbsp;&nbsp;'
		);
		foreach($tree as &$node){
			$node = explode(":", $node);
			$node['name'] = $groupsAndUsersLists[$node[1].'s'][$node[2]];
			$allowed = $this->Acl->check(
				array('model' => ''.$node[1].'', 'foreign_key' => $node[2]),
				array('model' => 'Menu', 'foreign_key' => $id)
			);
			if($allowed){
				$node['allowed'] = 1;
			}else{
				$node['allowed'] = 0;
			}
		}
		$groupActionsMenu = $this->DatabaseMenus->getMenu('actions', 'Groups');
		$userActionsMenu = $this->DatabaseMenus->getMenu('actions', 'Users');
		$this->set(compact('tree', 'groupActionsMenu', 'userActionsMenu'));
	}

	public function movedown($id = null){
		$this->__moveNode($id, 'down');
	}

	public function moveup($id = null){
		$this->__moveNode($id, 'up');
	}

	private function __moveNode($id, $direction){
		$this->_checkIdPresence($id, 'tree');
		$aco = $this->Acl->Aco->find('first', array(
			'conditions' => array('Aco.foreign_key' => $id, 'Aco.model' => 'Menu'),
			'recursive' => 0
		));
		if($this->Acl->Aco->{'move'.$direction}($aco['Aco']['id'], 1)){
			// Success message
			$this->_flash(sprintf(__('The item has been moved %s.', true), $direction), 'success');
			//Delete menus cache
			$this->DatabaseMenus->clearCache();
		}else{
			// Error message
			$this->_flash(sprintf(__('The item could not be moved %s.', true), $direction), 'error');
		}
		$this->redirect(array('action' => 'tree'));
	}

	public function verifyTree(){
		$treeErrors = array();
		$errors = $this->Acl->Aco->verify();
		if(is_array($errors)){
			foreach($errors as &$error){
				if($error[0] == 'index'){
					$error['message'] = $error[2].' left/right '.$error[0].' '.$error[1];
				}else{
					$error['message'] = $error[2];
					$treeErrors[] = $this->Menu->find(
						'all',
						array('conditions' => array('Menu.id =' => $error[1]))
					);
				}
			}
		}else{ // If no tree errors have been found redirect to index page.
			$this->_flash(__('No errors have been found.', true), 'info');
			$this->redirect(array('action'=>'index'));
		}
		$this->set(compact('treeErrors', 'errors'));
	}

	public function recover(){
		if($this->Acl->Aco->recover()){
			$this->_flash(__('The tree has been recovered.', true), 'success');
			$this->redirect(array('action' => 'index'));
		}else{
			$this->_flash(__('The tree could not be recovered. Please, try again.', true), 'error');
			$this->redirect(array('action' => 'verifyTree'));
		}
	}

	public function redundant(){
		// Find redundant menu items
		$menus = $this->_findRedundantMenus();
		$this->set(compact('menus'));
	}

	/**
	 * Method to create default name for menu item. It takes method name and capitalizes the first letter.
	 * Then it takes $controller name, makes it singular and adds it to the method name.
	 * 
	 * @param string $model Model name, f.ex. 'Users'
	 * @param string $method Method name, f.ex. 'View'
	 * @return string, f.ex. "View User"
	 * */
	private function __makeMenuName($controller, $method){
		return trim(ucfirst($method).' '.Inflector::singularize($controller));
	}
	
	protected function _findMenuItem($data, $controller, $method = '', $plugin = ''){
		foreach($data as $item){
			if(
				$item['Menu']['controller'] == $controller AND
				$item['Menu']['method'] == $method AND
				$item['Menu']['plugin'] == $plugin
			){
				return $item;
			}
		}
		return null;
	}

	/**
	 * Method to find all available controllers and methods
	 * 
	 * @return array([$i] => array('controller'=>$controllerName, 'method'=>$methodName))
	 * */
	protected function _findACOsFromFiles(){
		$result = array();
		App::import('Core', 'File');
		$appControllers = Configure::listObjects('controller');
		$appIndex = array_search('App', $appControllers);
		if($appIndex !== false){
			unset($appControllers[$appIndex]);
		}
		foreach($appControllers as &$name){
			$name = array('plugin' => '', 'controller' => $name);
		}
		$Plugins = $this->_getPluginControllerNames();
		$Controllers = array_merge($appControllers, $Plugins);
		$baseMethods = get_class_methods('Controller');
		// look at each controller in app/controllers
		foreach($Controllers as $controller){
			App::import('Controller', $controller['controller']);
			$controllerClass = $controller['controller'].'Controller';
			$result[] = array('plugin' => $controller['plugin'], 'controller' => $controller['controller'], 'method' => null);
			$methods = get_class_methods($controllerClass);
			// Clean the methods. Remove those in Controller and private actions.
			foreach($methods as $k => $method) {
				if(strpos($method, '_', 0) === 0){
					unset($methods[$k]);
					continue;
				}
				if(in_array($method, $baseMethods)){
					unset($methods[$k]);
					continue;
				}
				$result[] = array(
					'plugin' => $controller['plugin'],
					'controller' => $controller['controller'],
					'method' => $method
				);
			}
		}
		return $result;
	}
	
	protected function _findACOsFromDB(){
		$acosFromDB = $this->Acl->Aco->find('all', array('recursive' => 0));
		// Assign key = id
		$acos = array();
		foreach($acosFromDB as $aco){
			$acos[$aco['Aco']['id']] = $aco;
		}
		// Find parents details
		foreach($acos as $key => &$aco){
			if(!is_null($aco['Aco']['parent_id'])){
				$aco['Parent'] = $acos[$aco['Aco']['parent_id']]['Aco'];
			}
		}
		return $acos;
	}

	protected function _findRedundantAcos(){
		$redundant = array();
		// Find all possible ACOs from files
		$acosFromFiles = $this->_findACOsFromFiles();
		// Find all ACOs from tables
		$acosFromDB = $this->_findACOsFromDB();
		foreach($acosFromDB as $key => $acoDB){
			foreach($acosFromFiles as $acoF){
				if(
					$acoDB['Aco']['alias'] == $acoF['controller'] OR 
					$acoDB['Aco']['alias'] == 'controllers' OR
					$acoDB['Aco']['alias'] == 'Pages' OR
						($acoDB['Aco']['alias'] == $acoF['method'] AND 
						$acoDB['Parent']['alias'] == $acoF['controller'])
				){
					// Not redundant
					unset($acosFromDB[$key]);
					continue 2;
				}
			}
		}
		return $acosFromDB;
	}

	protected function _findRedundantMenus(){
		$result = array();
		// Find all menus
		$savedMenus = $this->Menu->find('all');
		// Find redundant ACOs
		$redundantACOs = $this->_findRedundantAcos();
		foreach($redundantACOs as $aco){
			foreach($savedMenus as $menu){
				if($aco['Aco']['foreign_key'] == $menu['Menu']['id']){
					$result[] = $menu;
				}
				continue;
			}
		}
		return $result;
	}

	/**
	 * Get the names of the plugin controllers
	 * 
	 * This function will get an array of the plugin controller names, and
	 * also makes sure the controllers are available for us to get the
	 * method names by doing an App::import for each plugin controller.
	 *
	 * @return array List of plugin names
	 */
	protected function _getPluginControllerNames(){
		$result = array();
		App::import('Core', 'File', 'Folder');
		$paths = Configure::getInstance();
		$folder =& new Folder();
		// change directory to the plugins
		$folder->cd(APP.'plugins');
		// get a list of the files that have a file name that ends with controller.php
		$files = $folder->findRecursive('.*_controller\.php');
		// Get the list of plugins
		$Plugins = Configure::listObjects('plugin');
		// loop through the controllers we found in the plugins directory
		foreach($files as $f => $fileName){
			// get the base file name
			$file = basename($fileName);
			// get the controller name
			$file = Inflector::camelize(substr($file, 0, strlen($file) - strlen('_controller.php')));
			// loop through the plugins
			foreach($Plugins as $pluginName){
				// first, get rid of the App controller for the plugin
				// we do this because the app controller is never called directly
				if(preg_match('/^'.$pluginName.'App/', $file)){
					unset($files[$f]);
				}else{
					if(!App::import('Controller', $pluginName.'.'.$file)){
						$error = sprintf(__('Error importing %s for plugin %s.', true), $file, $pluginName);
						$this->_flash($error, 'error');
					}
					// now prepend the Plugin name
					// this is required to allow us to fetch the method names
					$files[$f] = $file;
					$result[$f]['plugin'] = $pluginName;
					$result[$f]['controller'] = $file;
				}
				break;
			}
		}
		return $result;
	}
}
?>