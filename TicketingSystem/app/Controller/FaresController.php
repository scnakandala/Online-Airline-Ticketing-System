<?php
App::uses('AppController', 'Controller');
/**
 * Fares Controller
 *
 * @property Fare $Fare
 */
class FaresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Fare->recursive = 0;
		$this->set('fares', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Fare->id = $id;
		if (!$this->Fare->exists()) {
			throw new NotFoundException(__('Invalid fare'));
		}
		$this->set('fare', $this->Fare->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fare->create();
			if ($this->Fare->save($this->request->data)) {
				$this->Session->setFlash(__('The fare has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fare could not be saved. Please, try again.'));
			}
		}
		$flights = $this->Fare->Flight->find('list');
		$this->set(compact('flights'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Fare->id = $id;
		if (!$this->Fare->exists()) {
			throw new NotFoundException(__('Invalid fare'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Fare->save($this->request->data)) {
				$this->Session->setFlash(__('The fare has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fare could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Fare->read(null, $id);
		}
		$flights = $this->Fare->Flight->find('list');
		$this->set(compact('flights'));
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
		$this->Fare->id = $id;
		if (!$this->Fare->exists()) {
			throw new NotFoundException(__('Invalid fare'));
		}
		if ($this->Fare->delete()) {
			$this->Session->setFlash(__('Fare deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fare was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
