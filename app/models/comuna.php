<?php
class Comuna extends AppModel {
	var $name = 'Comuna';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Regione' => array(
			'className' => 'Regione',
			'foreignKey' => 'region_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
