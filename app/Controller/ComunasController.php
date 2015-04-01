<?php
App::uses('AppController', 'Controller');
/**
 * Comunas Controller
 *
 * @property Comuna $Comuna
 */
class ComunasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comuna->recursive = 0;
		$this->set('comunas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comuna->exists($id)) {
			throw new NotFoundException(__('Invalid comuna'));
		}
		$options = array('conditions' => array('Comuna.' . $this->Comuna->primaryKey => $id));
		$this->set('comuna', $this->Comuna->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comuna->create();
			if ($this->Comuna->save($this->request->data)) {
				$this->Session->setFlash(__('The comuna has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comuna could not be saved. Please, try again.'));
			}
		}
		$regions = $this->Comuna->Region->find('list');
		$this->set(compact('regions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comuna->exists($id)) {
			throw new NotFoundException(__('Invalid comuna'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comuna->save($this->request->data)) {
				$this->Session->setFlash(__('The comuna has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comuna could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comuna.' . $this->Comuna->primaryKey => $id));
			$this->request->data = $this->Comuna->find('first', $options);
		}
		$regions = $this->Comuna->Region->find('list');
		$this->set(compact('regions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comuna->id = $id;
		if (!$this->Comuna->exists()) {
			throw new NotFoundException(__('Invalid comuna'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comuna->delete()) {
			$this->Session->setFlash(__('Comuna deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Comuna was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
