<?php
App::uses('AppModel', 'Model');
/**
 * Airplane Model
 *
 * @property SpecificFlight $SpecificFlight
 */
class Airplane extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'SpecificFlight' => array(
			'className' => 'SpecificFlight',
			'foreignKey' => 'specific_flight_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
