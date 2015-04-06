<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Usuario', 'Comuna', 'Regione', 'Vehiculo');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
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

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function home() {
		$title = 'Home';
		$this->set(compact('title'));
	}

	public function suscribe( $tipo = null ) {
		if ($this->request->is('post')) {
			$cleanRut = strtoupper(str_replace(array("-", "."), array("", ""), $this->request->data['Usuario']['rut']));

			// if ( !empty( $this->Usuario->findByRut( $cleanRut ) ) ) {
			// 	$this->Session->setFlash('RUT registrado previamente.');
			// 	$this->redirect("/");
			// }

			$usuarioToSave = array(
					'who' => $this->request->data['Usuario']['who'],
					'paytype' => $this->request->data['Usuario']['paytype'],
					'firts_name' => $this->request->data['Usuario']['first_name'],
					'last_name' => $this->request->data['Usuario']['last_name'],
					'rut' => $cleanRut,
					'p4ss' => $this->request->data['Usuario']['p4ss'],
					'address' => $this->request->data['Usuario']['address'],
					'mail' => $this->request->data['Usuario']['mail'],
					'comuna_id' => $this->request->data['Usuario']['comuna_id'],
					'cod' => $this->request->data['Usuario']['cod'],
					'phone' => $this->request->data['Usuario']['phone'],
					'mobile' => $this->request->data['Usuario']['mobile'],
					'agree' => ($this->request->data['agree']) ? $this->request->data['agree'] : 0,
					'created_at' => date('Y-m-d H:i:s')
				);
				
				$this->Usuario->save( $usuarioToSave );
				$newUserId = $this->Usuario->id;
				if ( $newUserId ) {
					$carDocTypes = $this->request->data['Usuario']['car'];
					$carDocValue = $this->request->data['Usuario']['car_value'];
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
						"name" => utf8_encode($comun["Comuna"]["name"]),
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

	public function gracias() {
		if ($this->request->is('post')) {
			if ( isset($this->request->data['Usuario']['mail']) && !empty($this->request->data['Usuario']['mail']) ) {
				//foreach ($this->request->data['Usuario']['mail'] as $key => $emailStr) {
						$email = new CakeEmail();
            $email->config('default')
                    ->subject("Suscribe tu tag...")
                    ->to($this->request->data['Usuario']['mail'])
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