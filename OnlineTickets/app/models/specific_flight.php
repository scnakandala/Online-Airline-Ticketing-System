<?php
class SpecificFlight extends AppModel {

	var $name = 'SpecificFlight';
	var $validate = array(
		'flight_id' => array('numeric'),
		'airplane_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Flight' => array(
			'className' => 'Flight',
			'foreignKey' => 'flight_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Airplane' => array(
			'className' => 'Airplane',
			'foreignKey' => 'airplane_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Reservation' => array(
			'className' => 'Reservation',
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