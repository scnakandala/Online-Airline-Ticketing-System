<?php
/* SVN FILE: $Id$ */
/**
 * Menus table model class.
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

class Menu extends BcpAppModel {

	public $actsAs = array(
		'Acl' => array('type' => 'controlled'),
	);
	public $validate = array(
		'id' => array('numeric'),
		'type' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255)
			),
			'inList' => array(
				'rule' => array('inList', array('main', 'extra', 'actions', 'manual'))
			)
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255)
			),
			'isUnique' => array(
				'rule' => 'isUnique'
			),
		),
		'parent_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'required' => false
			),
		),
		'plugin' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 100)
			),
		),
		'controller' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			),
			'maxLength' => array(
				'rule' => array('maxLength', 100)
			),
		),
		'method' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 100)
			),
		),
		'published' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'required' => false
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Parent' => array(
			'className' => 'Bcp.Menu',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function parentNode(){
		if(!$this->id && empty($this->data)){
			return null;
		}
		$data = $this->data;
		if(empty($this->data)){
			$data = $this->read();
		}
		if(!$data['Menu']['parent_id']){
			return null;
		}else{
			if(!empty($data['Menu']['method'])){
				$alias = $data['Menu']['method'];
			}else{
				$alias = $data['Menu']['controller'];
			}
			return array('Menu' => array('id' => $data['Menu']['parent_id'], 'alias' => $alias));
		}
	}

	/*
	 * After save callback
	 *
	 * Update the aco for the menu item.
	 *
	 * @access public
	 * @return void
	 */
	public function afterSave($created){
		$data = $this->parentNode();
		$parent = $this->node($data);
		$node = $this->node();
		$aco = $node[0];
		$aco['Aco']['parent_id'] = $parent[0]['Aco']['id'];
		$aco['Aco']['alias'] = $data['Menu']['alias'];
		$this->Aco->save($aco);

		//Delete menus cache
		App::import('Component', 'DatabaseMenus');
		$databaseMenus = new DatabaseMenusComponent();
		$databaseMenus->clearCache();
	}
}
?>