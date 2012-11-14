<?php
class Reservation extends AppModel {

	var $name = 'Reservation';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
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

	var $hasMany = array(
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
?>