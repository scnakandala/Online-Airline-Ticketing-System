<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
	public $name = 'User';
	public $validate = array(
			'username'=>array(
				'required' =>array(
					'rule'=>array('nonEmpty'),
					'message'=> 'A username is required'	
				)
			),
			'password'=>array(
				'required'=>array(
					'rule'=>array('nonEmpty'),
					'message'=>'A password is required'
				)
			),
			'role'=>array(
				'valid' => array(
					'rule'=>array('inList',array('administrator')),
					'message'=>'Please enter a valid role',
					'allowEmpty' => false
				)
			)
	);
	
	/**
	 * beforeSave method
	 *
	 * @return boolean
	 */
	public function beforeSave($options= array()) {
		debug("Hello");
		if (isset($this -> data[$this -> alias]['password'])) {
			$this -> data[$this -> alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
			return true;
		} else {
			return false;
		}
	}
}
