<?php
App::uses('AppController', 'Controller');
/**
 * Creditcards Controller
 *
 * @property Creditcard $Creditcard
 */
class CreditcardsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Creditcard->recursive = 0;
		$this->set('creditcards', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Creditcard->id = $id;
		if (!$this->Creditcard->exists()) {
			throw new NotFoundException(__('Invalid creditcard'));
		}
		$this->set('creditcard', $this->Creditcard->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Creditcard->create();
			if ($this->Creditcard->save($this->request->data)) {
				$this->Session->setFlash(__('The creditcard has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The creditcard could not be saved. Please, try again.'));
			}
		}
		$reservations = $this->Creditcard->Reservation->find('list');
		$this->set(compact('reservations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Creditcard->id = $id;
		if (!$this->Creditcard->exists()) {
			throw new NotFoundException(__('Invalid creditcard'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Creditcard->save($this->request->data)) {
				$this->Session->setFlash(__('The creditcard has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The creditcard could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Creditcard->read(null, $id);
		}
		$reservations = $this->Creditcard->Reservation->find('list');
		$this->set(compact('reservations'));
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
		$this->Creditcard->id = $id;
		if (!$this->Creditcard->exists()) {
			throw new NotFoundException(__('Invalid creditcard'));
		}
		if ($this->Creditcard->delete()) {
			$this->Session->setFlash(__('Creditcard deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Creditcard was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
