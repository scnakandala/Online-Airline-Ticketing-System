<?php
/* SVN FILE: $Id$ */
/**
 * Groups table model class.
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

class Group extends BcpAppModel {

	public $order = 'Group.name';
	public $actsAs = array(
		'Acl' => array('requester'),
	);
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			),
			'maxLength' => array(
				'rule' => array('maxLength', 100)
			),
			'isUnique' => array(
				'rule' => 'isUnique'
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasMany = array(
		'User' => array(
			'className' => 'Bcp.User',
			'foreignKey' => 'group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	/* Creates a broblem with i18n table
	 * public $belongsTo = array(
		'Parent' => array(
			'className' => 'Group',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => 'name',
			'order' => ''
		)
	);*/

	function parentNode(){
		if(!$this->id && empty($this->data)){
			return null;
		}
		$data = $this->data;
		if(empty($this->data)){
			$data = $this->read();
		}
		if(!$data['Group']['parent_id']){
			return null;
		}else{
			return array('Group' => array('id' => $data['Group']['parent_id']));
		}
	}

	function afterSave($created){
		if($created){
			// its a creation
			$id = $this->getLastInsertID();
			$aro = new Aro();
			$aro->updateAll(
				array('alias' => '\'Group:'.$id.'\''),
				array('Aro.model' => 'Group', 'Aro.foreign_key' => $id)
			);
		}else{
			// its an edit, we have to update the tree
			$data = $this->read();
			$parent_id = $data['Group']['parent_id'];
			$aro = new Aro();
			$aro_record = $aro->findByForeignKey($this->id);
			$parent_record = $aro->findByForeignKey($parent_id);
			if(empty($aro_record)){
				// orphaned child
				$this->Aro->save(array(
					'model' => $this->name,
					'foreign_key' => $this->id,
					'alias' => $this->name.':'.$this->id,
					'parent_id' => $parent_record['Aro']['id']
				));
			}else{
				// just moving nodes
				$this->Aro->save(array(
					'model' => $this->name,
					'foreign_key' => $this->id,
					'alias' => $this->name.':'.$this->id,
					'parent_id' => $parent_record['Aro']['id'],
					'id' => $aro_record['Aro']['id']
				));
			}
		}
		return true;
	}

	public function findParentDetails($parent_id){
		$parent = $this->find('first', array(
			'conditions' => array(
				'Group.id' => $parent_id
			),
			'recursive' => 0,
		));
		return $parent;
	}
}
?>