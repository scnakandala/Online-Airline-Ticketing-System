<?php
App::uses('AppController', 'Controller');
/**
 * Airports Controller
 *
 * @property Airport $Airport
 */
class AirportsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Airport->recursive = 0;
		$this->set('airports', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Airport->id = $id;
		if (!$this->Airport->exists()) {
			throw new NotFoundException(__('Invalid airport'));
		}
		$this->set('airport', $this->Airport->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Airport->create();
			if ($this->Airport->save($this->request->data)) {
				$this->Session->setFlash(__('The airport has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The airport could not be saved. Please, try again.'));
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
		$this->Airport->id = $id;
		if (!$this->Airport->exists()) {
			throw new NotFoundException(__('Invalid airport'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Airport->save($this->request->data)) {
				$this->Session->setFlash(__('The airport has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The airport could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Airport->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Airport->id = $id;
		if (!$this->Airport->exists()) {
			throw new NotFoundException(__('Invalid airport'));
		}
		if ($this->Airport->delete()) {
			$this->Session->setFlash(__('Airport deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Airport was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
