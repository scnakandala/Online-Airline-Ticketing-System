<?php
class Flight extends AppModel {

	var $name = 'Flight';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Fare' => array(
			'className' => 'Fare',
			'foreignKey' => 'flight_id',
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

	var $hasAndBelongsToMany = array(
		'Specific' => array(
			'className' => 'SpecificFlight',
			'joinTable' => 'specific_flights',
			'foreignKey' => 'flight_id',
			'associationForeignKey' => 'flight_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>