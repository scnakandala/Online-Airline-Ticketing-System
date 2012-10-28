<?php
App::uses('AppModel', 'Model');
/**
 * Flight Model
 *
 * @property Fare $Fare
 * @property Specificflight $Specificflight
 */
class Flight extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
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
		),
		'Specificflight' => array(
			'className' => 'Specificflight',
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

}
