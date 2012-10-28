<?php
App::uses('AppController', 'Controller');
/**
 * Airplanes Controller
 *
 * @property Airplane $Airplane
 */
class AirplanesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Airplane->recursive = 0;
		$this->set('airplanes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Airplane->id = $id;
		if (!$this->Airplane->exists()) {
			throw new NotFoundException(__('Invalid airplane'));
		}
		$this->set('airplane', $this->Airplane->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Airplane->create();
			if ($this->Airplane->save($this->request->data)) {
				$this->Session->setFlash(__('The airplane has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The airplane could not be saved. Please, try again.'));
			}
		}
		$specificFlights = $this->Airplane->SpecificFlight->find('list');
		$this->set(compact('specificFlights'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Airplane->id = $id;
		if (!$this->Airplane->exists()) {
			throw new NotFoundException(__('Invalid airplane'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Airplane->save($this->request->data)) {
				$this->Session->setFlash(__('The airplane has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The airplane could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Airplane->read(null, $id);
		}
		$specificFlights = $this->Airplane->SpecificFlight->find('list');
		$this->set(compact('specificFlights'));
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
		$this->Airplane->id = $id;
		if (!$this->Airplane->exists()) {
			throw new NotFoundException(__('Invalid airplane'));
		}
		if ($this->Airplane->delete()) {
			$this->Session->setFlash(__('Airplane deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Airplane was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
