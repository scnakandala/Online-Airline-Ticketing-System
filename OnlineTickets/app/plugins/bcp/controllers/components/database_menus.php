<?php
/* SVN FILE: $Id$ */
/**
 * Database driven menus component.
 *
 * Uses database table 'menus' to generate Menus.
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

class DatabaseMenusComponent extends Object{

	/**
	 * Components used by Menu
	 * @var array
	 */
	public $components = array('Acl', 'Auth');

	/**
	 * Set to false to disable the auto menu generation in startup()
	 * Useful if you want your menus generated other than for the user in the current session.
	 * @var boolean
	 */
	public $autoLoad = true;

	/**
	 * Controller reference
	 * @var object
	 */
	public $Controller = null;

	/**
	 * Key for the caching
	 * @var string
	 */
	public $cacheKey = 'db_menu';

	/**
	 * Time to cache menus for.
	 * @var string  String compatible with strtotime.
	 */
	public $cacheTime = '+1 day';

	/**
	 * Cache config key
	 * @var string
	 */
	public $cacheConfig = 'menu_component';

	/**
	 * The completed main menu for the current user.
	 * @var array
	 */
	public $mainMenu = array();

	/**
	 * The completed extra menu for the current user for the current page.
	 * @var array
	 */
	public $extraMenu = array();

	/**
	 * The completed actions menu for the current user for the current page.
	 * @var array
	 */
	public $actionsMenu = array();

	/**
	 * Raw menus before formatting, either loaded from the database or loading Cache
	 * @var array
	 */
	public $rawMenus = array();

	/**
	 * Internal Flag to check if new menus have been added to a cached menu set.
	 * Indicates that new menu items have been added and that menus need to be rebuilt.
	 * @var boolean
	 */
	protected $_rebuildMenus = false;

	public function initialize(&$Controller, $settings = array()) {
		// saving the controller reference for later use
		$this->Controller =& $Controller;
	}

	/**
	 * Startup Method
	 *
	 * Automatically makes menus for all a the controllers based on the current user.
	 * @param Object $Controller
	 */
	public function startup(&$Controller){

		Cache::config($this->cacheConfig, array(
			'engine' => 'File',
			'duration' => $this->cacheTime,
			'prefix' => $this->cacheKey.'_'
		));

		// No active session, no menu can be generated
		if(!$this->Auth->user()){
			return;
		}
		if($this->autoLoad){
			$this->__loadCache();
			$this->__constructMenu('main');
			$this->__constructMenu('extra');
			$this->__constructMenu('actions');
			$this->__writeCache();
		}
	}

	/**
	 * BeforeRender Callback.
	 */
	public function beforeRender(&$Controller){
		$this->Controller->set('mainMenu', $this->mainMenu);
		$this->Controller->set('extraMenu', $this->extraMenu);
		$this->Controller->set('actionsMenu', $this->actionsMenu);
	}

	/**
	 * Method to generate any menu for any controller from anywhere
	 * 
	 * @param string $type - Menu type
	 * @param string $controller - Controller name
	 * @return array
	 */
	public function getMenu($type, $controller){
		return $this->__constructMenu($type, $controller);
	}

	/**
	 * Clears the raw Menu Cache, this will in turn force
	 * a menu rebuild for each ARO that needs a menu.
	 *
	 * @return boolean
	 **/
	public function clearCache(){
		return Cache::delete($this->cacheKey, $this->cacheConfig);
	}

	/**
	 * Write the current Block Access data to a file.
	 *
	 * @return boolean on success of writing a file.
	 */
	private function __writeCache(){
		if(Cache::write($this->cacheKey, $this->rawMenus, $this->cacheConfig)){
			return true;
		}
		$this->log('Database menu component could not write menu cache.');
		return false;
	}

	/**
	 * Load the cached menus and restore them
	 * 
	 * @return boolean true if cache was loaded.
	 */
	private function __loadCache(){
		if($data = Cache::read($this->cacheKey, $this->cacheConfig)){
			$this->rawMenus = $data;
			return true;
		}
		$this->_rebuildMenus = true;
		return false;
	}

	/**
	 * 
	 * @param string $type
	 * @param string $controller
	 * @return unknown_type
	 */
	private function __constructMenu($type, $controller = null){
		$cacheKey = $this->__makeCacheKey($type, $controller);
		$completeMenu = Cache::read($cacheKey, $this->cacheConfig);
		if(!$completeMenu || $this->_rebuildMenus == true){
			$this->__generateRawMenus();
			$menu = $this->__filterRawMenus($type, $controller);
			if($type == 'main'){
				$completeMenu = $this->__formatMenu($menu);
			}else{
				$completeMenu = $menu;
			}
			Cache::write($cacheKey, $completeMenu, $this->cacheConfig);
		}
		if(is_null($controller)){
			$this->{$type.'Menu'} = $completeMenu;
		}else{
			return $completeMenu;
		}
	}

	/**
	 * 
	 * @param string $menuType
	 * @param string $controller
	 * @return unknown_type
	 */
	private function __makeCacheKey($menuType, $controller = null){
		$aro = $this->Auth->user();
		$aroKey = $aro;
		if(is_array($aro)){
			$aroKey = key($aro).$aro[key($aro)]['id'];
		}
		$cacheKey = $aroKey.'_'.$menuType;
		if($menuType == 'extra' OR $menuType == 'actions'){
			if(is_null($controller)){
				$cacheKey .= '_'.strtolower($this->Controller->name).'_'.$this->Controller->action;
			}else{
				$cacheKey .= '_'.strtolower($controller).'_index';
			}
		}
		return $cacheKey;
	}

	/**
	 * 
	 * @param string $menuType
	 * @param string $controller
	 * @return unknown_type
	 */
	private function __filterRawMenus($menuType, $controller = null){
		$menu = array();
		$action = '';
		if(is_null($controller)){
			$controller = $this->Controller->name;
			$action = $this->Controller->action;
		}
		foreach($this->rawMenus as $item){
			if(
				($item['Menu']['type'] == 'extra' OR $item['Menu']['type'] == 'actions') AND
				$item['Menu']['controller'] != $controller OR
				$item['Menu']['method'] == $action
			){
				continue;
			}elseif($action == 'logout'){
				// Do not build any menu for logout action.
				break;
			}elseif($item['Menu']['type'] == $menuType){
				$aro = $this->Auth->user();
				$aco = array(
					'model' => $item['Aco']['model'],
					'foreign_key' => $item['Aco']['foreign_key']
				);
				if($this->Acl->check($aro, $aco)){
					$menu[] = $item;
				}
			}
		}
		return $menu;
	}

	/**
	 * Generate Raw Menus from the database
	 * 
	 * @return void sets $this->rawMenus
	 */
	private function __generateRawMenus(){
		$menus = ClassRegistry::init('Menu');
		if(empty($this->rawMenus)){
			/* Use direct query because there is no model for acos table. That is the easiest way I found
			 * to use INNER JOIN. We need lft field for correct menus sorting. */
			$this->rawMenus = $menus->query("
				SELECT * FROM menus AS Menu
				INNER JOIN acos AS Aco
				ON Menu.published = 1
				AND Aco.foreign_key = Menu.id
				AND Aco.model = 'Menu'
				ORDER BY Aco.lft
			");
		}
	}

	/**
	 * Recursive function to construct Menu
	 * 
	 * @param unknown_type $menu
	 */
	private function __formatMenu($menu){
		$out = $idMap = array();
		foreach($menu as $item){
			$item['Children'] = array();
			$id = $item['Menu']['id'];
			$parentId = $item['Menu']['parent_id'];
			if(isset($idMap[$id]['Children'])){
				$idMap[$id] = am($item, $idMap[$id]);
			}else{
				$idMap[$id] = am($item, array('Children' => array()));
			}
			if($parentId != 1){
				$idMap[$parentId]['Children'][] =& $idMap[$id];
			}else{
				$out[] =& $idMap[$id];
			}
		}
		return $out;
	}
}
?>