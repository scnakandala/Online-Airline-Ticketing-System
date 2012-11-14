<?php
/* SVN FILE: $Id$ */
/**
 * Users table model class.
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

class User extends BcpAppModel {

	public $actsAs = array('Acl' => array('requester'));

	public $validate = array(
		'id' => array('numeric'),
		'username' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true
			),
			'between' => array(
				'rule' => array('between', 5, 30)
			),
			'isUnique' => array(
				'rule' => 'isUnique'
			),
		),
		'password' => array(
			'minLength' => array(
				'rule' => array('minLength', '8')
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			)
		),
		'confirm_password' => array(
			'minLength' => array(
				'rule' => array('minLength', '8'),
				'required' => true
			),
			'notEmpty' => array(
				'rule' => 'notEmpty'
			),
			'comparePasswords' => array(
				'rule' => '_comparePasswords' // Protected function below
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'required' => true
			))
	);

	public $belongsTo = array(
		'Group' => array(
			'className' => 'Bcp.Group',
			'foreignKey' => 'group_id',
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
		if(!isset($data['User']['group_id']) OR !$data['User']['group_id']){
			return null;
		}else{
			return array('Group' => array('id' => $data['User']['group_id']));
		}
	}

	/**
	 * After save callback
	 *
	 * Update the aro for the user.
	 *
	 * @access public
	 * @return void
	 */
	function afterSave($created) {
		if($created){
			// It is a creation
			$id = $this->getLastInsertID();
			$aro = new Aro();
			$aro->updateAll(
				array('alias' => '\'User:'.$id.'\''),
				array('Aro.model' => 'User', 'Aro.foreign_key' => $id)
			);
		}else{
			$parent = $this->parentNode();
			$parent = $this->node($parent);
			$node = $this->node();
			$aro = $node[0];
			$aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
			$this->Aro->save($aro);
		}
	}

	/**
	 * Method used to validate password fields in the comparePasswords validation rule.
	 * 
	 * @return unknown_type
	 */
	protected function _comparePasswords(){
		$hashedConfirmPassword = Security::hash($this->data['User']['confirm_password'], null, true);
		if($this->data['User']['password'] == $hashedConfirmPassword){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Method to save login time
	 * 
	 * @param $id
	 * @return unknown_type
	 */
	function lastLogin($id){
		$this->id = $id;
		$this->saveField('last_login', date('Y-m-d H:i:s'));
	}
}
?>