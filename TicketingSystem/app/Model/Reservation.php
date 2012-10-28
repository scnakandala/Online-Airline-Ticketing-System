<?php
App::uses('AppModel', 'Model');
/**
 * Reservation Model
 *
 * @property Fare $Fare
 * @property SpecificFlight $SpecificFlight
 * @property Creditcard $Creditcard
 * @property Customer $Customer
 */
class Reservation extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Fare' => array(
			'className' => 'Fare',
			'foreignKey' => 'fare_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SpecificFlight' => array(
			'className' => 'SpecificFlight',
			'foreignKey' => 'specific_flight_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Creditcard' => array(
			'className' => 'Creditcard',
			'foreignKey' => 'reservation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'reservation_id',
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

}
