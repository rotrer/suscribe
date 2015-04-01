<?php
App::uses('AppController', 'Controller');
/**
 * Regiones Controller
 *
 * @property Regione $Regione
 */
class RegionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Regione->recursive = 0;
		$this->set('regiones', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Regione->exists($id)) {
			throw new NotFoundException(__('Invalid regione'));
		}
		$options = array('conditions' => array('Regione.' . $this->Regione->primaryKey => $id));
		$this->set('regione', $this->Regione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Regione->create();
			if ($this->Regione->save($this->request->data)) {
				$this->Session->setFlash(__('The regione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The regione could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Regione->exists($id)) {
			throw new NotFoundException(__('Invalid regione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Regione->save($this->request->data)) {
				$this->Session->setFlash(__('The regione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The regione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Regione.' . $this->Regione->primaryKey => $id));
			$this->request->data = $this->Regione->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Regione->id = $id;
		if (!$this->Regione->exists()) {
			throw new NotFoundException(__('Invalid regione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Regione->delete()) {
			$this->Session->setFlash(__('Regione deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Regione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
