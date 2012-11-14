<?php
class Fare extends AppModel {

	var $name = 'Fare';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Flight' => array(
			'className' => 'Flight',
			'foreignKey' => 'flight_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Reservation' => array(
			'className' => 'Reservation',
			'foreignKey' => 'fare_id',
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