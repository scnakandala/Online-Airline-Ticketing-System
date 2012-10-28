<?php
App::uses('AppModel', 'Model');
/**
 * Specificflight Model
 *
 * @property Flight $Flight
 */
class Specificflight extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Flight' => array(
			'className' => 'Flight',
			'foreignKey' => 'flight_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
