<?php
class Airplane extends AppModel {

	var $name = 'Airplane';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'SpecificFlight' => array(
			'className' => 'SpecificFlight',
			'foreignKey' => 'airplane_id',
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