<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html');

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array('Usuario', 'Regione', 'Comuna', 'Vehiculo');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}

	function home() {
		$title = 'Home';
		$this->set(compact('title'));
	}

	function suscribe( $tipo = null ) {
		if ($this->data) {
			$cleanRut = strtoupper(str_replace(array("-", "."), array("", ""), $this->data['Usuario']['rut']));

			// if ( !empty( $this->Usuario->findByRut( $cleanRut ) ) ) {
			// 	$this->Session->setFlash('RUT registrado previamente.');
			// 	$this->redirect("/");
			// }

			$usuarioToSave = array(
					'who' => $this->data['Usuario']['who'],
					'paytype' => $this->data['Usuario']['paytype'],
					'firts_name' => $this->data['Usuario']['first_name'],
					'last_name' => $this->data['Usuario']['last_name'],
					'rut' => $cleanRut,
					'p4ss' => $this->data['Usuario']['p4ss'],
					'address' => $this->data['Usuario']['address'],
					'mail' => $this->data['Usuario']['mail'],
					'comuna_id' => $this->data['Usuario']['comuna_id'],
					'cod' => $this->data['Usuario']['cod'],
					'phone' => $this->data['Usuario']['phone'],
					'mobile' => $this->data['Usuario']['mobile'],
					'agree' => ($this->data['agree']) ? $this->data['agree'] : 0,
					'created_at' => date('Y-m-d H:i:s')
				);
				
				$this->Usuario->save( $usuarioToSave );
				$newUserId = $this->Usuario->id;
				if ( $newUserId ) {
					$carDocTypes = $this->data['Usuario']['car'];
					$carDocValue = $this->data['Usuario']['car_value'];
					if ( isset($carDocTypes) && !empty($carDocTypes)) {
						foreach ($carDocTypes as $key => $car) {
							$this->Vehiculo->create();
							$vehiculoToSave =  array(
									"car" => strtoupper( $carDocTypes[$key] ),
									"car_value" => strtoupper( $carDocValue[$key] ),
									"usuario_id" => $newUserId,
									"created_at" => date('Y-m-d H:i:s')
								);
							$this->Vehiculo->save( $vehiculoToSave );
						}
					}
					#################################
					# Si es Servipag aplicar WS
					#################################
					
					
					#################################
					# Fin si es Servipag
					#################################
					$this->redirect("/gracias");
				} else {
					$this->Session->setFlash('Error al registrar sus datos, favor intentar nuevamente.');
					$this->redirect("/");
				}
		}
		if ( $tipo  == null ) {
			$this->redirect("/");
		}
		$regione = $this->Regione->find('all');
		$regioneR = $this->Regione->find('list');
		if($regione) foreach($regione as $region){
				$arrDataR[] = array(
						"id" => $region["Regione"]["id"],
						"name" => $region["Regione"]["name"]
				);
		}

		$comuna = $this->Comuna->find('all');
		if($comuna) foreach($comuna as $comun){
				$arrDataC[] = array(
						"id" => $comun["Comuna"]["id"],
						"name" => $comun["Comuna"]["name"],
						"region_id" => $comun["Comuna"]["region_id"]
				);
		}

		$this->set('regiones', $regione);
		$this->set('regionesR', $regioneR);
		$this->set('comunasArr', $arrDataC);
		$this->set('type', $tipo);

		$title = 'Suscribe';
		$this->set(compact('title'));
	}

	function gracias() {
		if ($this->data) {
			if ( isset($this->data['Usuario']['mail']) && !empty($this->data['Usuario']['mail']) ) {
				//foreach ($this->data['Usuario']['mail'] as $key => $emailStr) {
						$email = new CakeEmail();
            $email->config('default')
                    ->subject("Suscribe tu tag...")
                    ->to($this->data['Usuario']['mail'])
                    ->template("default")
                    ->emailFormat('html')
                    ->send();
				//}
			}
		}
		$title = 'Gracias';
		$this->set(compact('title'));
	}
}
