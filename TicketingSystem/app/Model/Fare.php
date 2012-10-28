<?php
App::uses('AppModel', 'Model');
/**
 * Fare Model
 *
 * @property Flight $Flight
 */
class Fare extends AppModel {


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
