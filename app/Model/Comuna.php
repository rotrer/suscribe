<?php
App::uses('AppModel', 'Model');
/**
 * Comuna Model
 *
 * @property Region $Region
 */
class Comuna extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Regione' => array(
			'className' => 'Regione',
			'foreignKey' => 'region_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
