<?php
App::uses('AppController', 'Controller');
/**
 * Flights Controller
 *
 * @property Flight $Flight
 */
class FlightsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Flight->recursive = 0;
		$this->set('flights', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Flight->id = $id;
		if (!$this->Flight->exists()) {
			throw new NotFoundException(__('Invalid flight'));
		}
		$this->set('flight', $this->Flight->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Flight->create();
			if ($this->Flight->save($this->request->data)) {
				$this->Session->setFlash(__('The flight has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The flight could not be saved. Please, try again.'));
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
		$this->Flight->id = $id;
		if (!$this->Flight->exists()) {
			throw new NotFoundException(__('Invalid flight'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Flight->save($this->request->data)) {
				$this->Session->setFlash(__('The flight has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The flight could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Flight->read(null, $id);
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
		$this->Flight->id = $id;
		if (!$this->Flight->exists()) {
			throw new NotFoundException(__('Invalid flight'));
		}
		if ($this->Flight->delete()) {
			$this->Session->setFlash(__('Flight deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Flight was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
