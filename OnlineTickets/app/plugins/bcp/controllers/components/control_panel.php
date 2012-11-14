<?php
/* SVN FILE: $Id$ */
/**
 * ControlPanel class.
 *
 * The class with useful functions for different controllers of control panel.
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

class ControlPanelComponent extends Object{

	public $components = array('Acl');

	// Called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
		// Saving the controller reference for later use
		$this->controller =& $controller;
	}

	public function tree($names){
		$modelName = Inflector::singularize($this->controller->name);
		if($modelName == 'Menu'){
			// Generate ACOs tree
			$aclTree = $this->Acl->Aco->generatetreelist(
				array('Aco.model' => $modelName),
				"{n}.Aco.foreign_key",
				" ",
				'&middot;&nbsp;&nbsp;&nbsp;'
			);
		}elseif($modelName == 'Group'){
			// Generate AROs tree
			$aclTree = $this->Acl->Aro->generatetreelist(
				array('Aro.model' => $modelName),
				"{n}.Aro.foreign_key",
				" ",
				'&middot;&nbsp;&nbsp;&nbsp;'
			);
		}
		// Generate names tree
		$tree = array();
		foreach($aclTree as $id => $node){
			$tree[$id][$modelName]['id'] = $id;
			$tree[$id][$modelName]['name'] = $node.$names[$id];
		}
		return $tree;
	}

	public function checkPermissions($id){
		$currentModelName = Inflector::singularize($this->controller->name);
		$menuInstance = ClassRegistry::init('Menu');
		$menuNames = $menuInstance->find('list', array('fields' => array('Menu.name')));
		$tree = $this->Acl->Aco->generatetreelist(
			null,
			"{n}.Aco.id",
			array(':{2}:{1}:{0}', '{n}.Aco.alias', '{n}.Aco.foreign_key', '{n}.Aco.model'),
			'&middot;&nbsp;&nbsp;&nbsp;'
		);
		foreach($tree as &$node){
			$node = explode(":", $node);
			$node['name'] = $node[0].$menuNames[$node[2]];
			$allowed = $this->Acl->check(
				array('model' => $currentModelName, 'foreign_key' => $id),
				array('model' => $node[1], 'foreign_key' => $node[2])
			);
			if($allowed){
				$node['allowed'] = 1;
			}else{
				$node['allowed'] = 0;
			}
		}
		return $tree;
	}

	public function findRecordedPermissions($id){
		$currentModelName = Inflector::singularize($this->controller->name);
		$permissions = $this->Acl->Aro->find('all', array(
			'conditions' => array(
				'Aro.foreign_key' => $id,
				'Aro.model' => $currentModelName
			)
		));
		$existingPermissions = array();
		foreach($permissions[0]['Aco'] as $aco){
			if(
				($aco['Permission']['_create'] == 1) &&
				($aco['Permission']['_read'] == 1) &&
				($aco['Permission']['_update'] == 1) &&
				($aco['Permission']['_delete'] == 1)
			){
				$existingPermissions[$aco['Permission']['aco_id']] = 1;
			}
			elseif(
				($aco['Permission']['_create'] == -1) &&
				($aco['Permission']['_read'] == -1) &&
				($aco['Permission']['_update'] == -1) &&
				($aco['Permission']['_delete'] == -1)
			){
				$existingPermissions[$aco['Permission']['aco_id']] = -1;
			}
		}
		return $existingPermissions;
	}
}
?>