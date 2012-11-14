<?php
class Creditcard extends AppModel {

	var $name = 'Creditcard';
	var $validate = array(
		'credit_card_no' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Reservation' => array(
			'className' => 'Reservation',
			'foreignKey' => 'reservation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>